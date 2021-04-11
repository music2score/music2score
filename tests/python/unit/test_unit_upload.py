from python.jobs import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
from python.upload import *
import os
import shutil
from unittest.mock import Mock, patch

class TestUpload(TestCase):
   
    def setUp(self):
        #create a folder named 1 under tests/python and have .pdf and .zip in it
        mypath='/project/tests/python/1/sample'
        try:
            if os.path.exists('/project/tests/python/1'):
                shutil.rmtree('/project/tests/python/1')
            os.mkdir('/project/tests/python/1')
            os.mkdir(mypath)
            shutil.copytree('/project/tests/python/test_data/sampleimages',mypath, dirs_exist_ok=True)
            shutil.copy('/project/tests/python/test_data/sample.pdf','/project/tests/python/1/')
        except OSError as error:  
            print(error)
            assert False
       

    def tearDown(self):
        #remove the folder named 1 under tests/python after the test completed
        mypath='/project/tests/python/1'
        if os.path.exists(mypath):
            shutil.rmtree(mypath)
        ret=os.path.exists(mypath)
        self.assertFalse(ret)

    def test_pngZip(self):
        
        #Check if given PNG files are zipped properly
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        mynewjob.__repr__

        #check if .zip file is created in the specified directory
        png2zip(mynewjob.filename,mynewjob.localFilePath())
        ret=os.path.exists('/project/tests/python/1' +"/" + 'sample.zip')
        self.assertTrue(ret)
        #Remove the .zip file and check if it is removed
        '''
        os.remove(mynewjob.localFilePath()+ '.zip')
        ret=os.path.exists(mynewjob.localFilePath()+ '.zip')
        self.assertEqual(False,ret)
        '''
        
    
    def test_upload_connection_error(self):
        mypath='/project/tests/python/1'
        shutil.copy('/project/tests/python/test_data/sample.pdf',mypath)

        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"

        with patch('python.upload.requests.post') as mock_post:
            # Configure the mock with connection error.
            mock_post.side_effect = requests.exceptions.ConnectionError()
            ret=upload_score(mynewjob,myurl)
        
        self.assertFalse(ret)
    
    def test_upload_optimal_size(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        
        with patch('python.upload.requests.post') as mock_post:
            # Configure the mock with proper response.
            mock_post.return_value.OK = True
            mock_post.return_value.status_code=200
            ret=upload_score(mynewjob,myurl)
            self.assertTrue(ret)
            retval=os.path.exists('/project/tests/python/1' +"/" + 'sample.zip')
            self.assertFalse(retval)
    
    def test_upload_size_exceeds_100MB(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        myurl= "dummyurl"
        
        with patch('python.upload.requests.post') as mock_post, patch('python.upload.check_size') as mock_check_size:
            # Configure the mock with proper response.
            mock_post.return_value.OK =True
            mock_post.return_value.status_code=200

            mock_check_size.return_value=False
            ret=upload_score(mynewjob,myurl)
            self.assertFalse(ret)
            retval=os.path.exists('/project/tests/python/1' +"/" + 'sample.zip')
            self.assertFalse(retval)

        