# Import libraries.
import shutil
import datetime
import unittest
import mysql.connector

from unittest import TestCase
from unittest.mock import Mock, patch
from collections import deque
from python.polling import *
from python.jobs import *
from python.download import *


class TestIntPolling(TestCase):
    def setUp(self):
        self.mydb = mysql.connector.connect(
            host="mysql_server_1",
            user="root",
            password="12345",
            database="testdb"
        )
        assert(self.mydb.is_connected())
        self.mycursor = self.mydb.cursor(buffered=True)

        mypath='/project/tests/python/1'
        try:
            if os.path.exists('/project/tests/python/1'):
                shutil.rmtree('/project/tests/python/1')
            os.mkdir(mypath)
            shutil.copy('/project/tests/python/test_data/sample.mid','/project/tests/python/1/')
        except OSError as error:  
            print(error)
            assert False

    def tearDown(self):
        self.setUp()
        sql_delete_user = "DELETE FROM user"
        sql_delete_jobs = "DELETE FROM jobs"
      
        self.mycursor.execute(sql_delete_user)
        self.mycursor.execute(sql_delete_jobs)
        self.mydb.commit()

        #remove the folder named 1 under tests/python after the test completed
        mypath='/project/tests/python/1'
        if os.path.exists(mypath):
            shutil.rmtree(mypath)
        ret=os.path.exists(mypath)
        self.assertFalse(ret)

    def test_fetch_job_return_false(self):
        '''
        '''
        self.mydb.close()
        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (False, None))

        return None

    def test_fetch_job_return_continue(self):
        '''
        '''
        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, None))

        return None

    def test_fetch_job_download_src_return_false(self):
        '''
        '''
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-04-08')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 4, 8, 0, 0))))

        mynewjob = JOB()
        myrestuple = ret[1]
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a error in response.
            stri="\x00"+"\x00"
            data=bytes(stri,'UTF-8')
            mock_post.return_value.status_code=200
            mock_post.return_value.content=data
            mock_post.return_value.OK = True
            
            ret=download_src(mynewjob, myurl)
        self.assertFalse(ret)

        return None

    def test_fetch_job_download_src_convert_return_false(self):
        '''
        '''
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-04-08')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 4, 8, 0, 0))))

        mynewjob = JOB()
        myrestuple=ret[1]
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a error in response.
            stri="MThd"+"\x00"+"\x00"
            data=bytes(stri,'UTF-8')
            mock_post.return_value.status_code=200
            mock_post.return_value.content=data
            mock_post.return_value.OK = True
            
            ret=download_src(mynewjob, myurl)
            self.assertTrue(ret)
            
            retval=os.path.exists('/project/tests/python/1' + "/" + 'sample.mid')
            self.assertTrue(retval)
            if os.path.exists('/project/tests/python/1'):
                shutil.rmtree('/project/tests/python/1')

        with patch('python.convert.subprocess.run') as mock_subprocess:
            mock_subprocess.side_effect = subprocess.CalledProcessError(returncode=2,cmd=["bad"])
            ret=convert(mynewjob)
        self.assertFalse(ret)

        return None

    def test_fetch_job_download_src_convert_upload_score_return_false(self):
        '''
        '''
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-04-08')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 4, 8, 0, 0))))

        mynewjob = JOB()
        myrestuple=ret[1]
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        
        ret=convert(mynewjob)
        self.assertEqual(ret, True)

        lyFile=os.path.exists('/project/tests/python/1' +"/" + 'sample.ly')
        self.assertTrue(lyFile)
        pngfile=os.path.exists('/project/tests/python/1/sample' +"/" + 'sample-page1.png')
        self.assertTrue(pngfile)

        mypath='/project/tests/python/1'
        shutil.copy('/project/tests/python/test_data/sample.pdf',mypath)

        with patch('python.upload.requests.post') as mock_post:
            # Configure the mock with connection error.
            mock_post.side_effect = requests.exceptions.ConnectionError()
            ret=upload_score(mynewjob, myurl)
        
        self.assertFalse(ret)

        return None

    def test_fetch_job_download_src_convert_upload_score_return_true(self):
        '''
        '''
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-04-08')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 4, 8, 0, 0))))

        mynewjob = JOB()
        myrestuple=ret[1]
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        
        ret=convert(mynewjob)
        self.assertEqual(ret, True)

        lyFile=os.path.exists('/project/tests/python/1' +"/" + 'sample.ly')
        self.assertTrue(lyFile)
        pngfile=os.path.exists('/project/tests/python/1/sample' +"/" + 'sample-page1.png')
        self.assertTrue(pngfile)

        mypath='/project/tests/python/1'
        shutil.copy('/project/tests/python/test_data/sample.pdf',mypath)

        with patch('python.upload.requests.post') as mock_post:
            # Configure the mock with proper response.
            mock_post.return_value.OK = True
            mock_post.return_value.status_code=200
            ret=upload_score(mynewjob,myurl)
            self.assertTrue(ret)
            retval=os.path.exists('/project/tests/python/1' + "/" + 'sample.zip')
            self.assertFalse(retval)

        return None


# #import sys
# #sys.path.append("d:\\Courses\\ECE651-Project\\music2score\\")
# from python.constants import *
# from python.polling import *
# from collections import deque
# import unittest
# from unittest import TestCase
# import mysql.connector as conn

# class TestPolling(TestCase):

 
#     def test_polling_with_no_trigger(self):
#         trigger = False
#         jobQueue = deque()
#         try:
#             result = polling(trigger, jobQueue)
#             self.assertEqual(result,True)
#         except Exception as ex:
#             print("Polling Error:\n" + str(ex))
#             self.assert_(False)
#     '''
#     def test_polling_with_no_job_in_DB(self):
#         trigger = True
#         jobQueue = deque()
#         result = polling(trigger, jobQueue)
#         self.assertEqual(result,True)
#     '''
#     def test_polling_with_job_in_DB(self):
#         trigger = True
#         jobQueue = deque()
#         try:
#             result = polling(trigger, jobQueue)
#             self.assertEqual(result,True)
#         except Exception as ex:
#             print("Polling Error:\n" + str(ex))
#             self.assert_(False)