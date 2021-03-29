#from tests.python.data_handling_testdb import *
from python.jobs import *
#from python.constants import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase

class TestJobs(TestCase):

    def setUp(self):
        self.mydb = mysql.connector.connect(
            host="mysql_server_1",
            user="root",
            password="12345",
            database="testdb"
        )
        assert(self.mydb.is_connected())
        self.mycursor = self.mydb.cursor(buffered=True)

    def tearDown(self):
        self.setUp()
        sql_delete_user = "DELETE FROM user"
        sql_delete_jobs = "DELETE FROM jobs"

        self.mycursor.execute(sql_delete_user)
        self.mycursor.execute(sql_delete_jobs)
        self.mydb.commit()

    def test_fetch_job_with_connection_error(self):
        
        """
        If the connection is unavailable it should return 
        (False, None). 
        """
        self.mydb.close()
        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (False, None))
    
    def test_fetch_job_with_no_jobs_available(self):
        
        """
        With an empty jobs table fetch should return (True, None)
        """
        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, None))
    
    def test_fetch_job_available(self):
        
        """
        With an available job that is not completed, the function should
        update the job processing to 1.
        """
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-03-23')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))))

        sqlUpdated = "SELECT * FROM jobs"
        self.mycursor.execute(sqlUpdated)
        self.mydb.commit()
        retUpdated = self.mycursor.fetchone()
        self.assertEqual(retUpdated, (1, 'sample.mid', 1, 1, 0, datetime.datetime(2021, 3, 23, 0, 0)))

    def test_fetch_job_available_connection_error(self):
        
        """
        With an available job that is not completed, if the connection to the 
        databse is lost the function should return (False, None).
        """
        sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
               VALUES (%s, %s, %s, %s, %s, %s)"
        vals = (1, 'sample.mid', 1, 0, 0, '2021-03-23')
        self.mycursor.execute(sql, vals)
        self.mydb.commit()

        self.mydb.close()
        ret = fetch_job(self.mycursor)
        self.assertEqual(ret, (False, None))
    
    def test_set_jobs_failure(self):
        mynewjob = JOB()
        myrestuple=()
        ret=mynewjob.set_job(myrestuple)
        self.assertFalse(ret)
  

    # def load_data(self):
    #     try:
    #         result=insert_data_into_testDB()
    #         self.assertTrue(result)
    #     except Exception as ex:
    #         print("Insert data into testdb Error:\n" + str(ex))
    #         return False
    
    # def test_fetchjob(self):
    #     try:
    #         mydbobj = conn.connect(dbTest)
    #         mycursor = mydbobj.cursor()
    #         fetchFlag, myresult = fetch_job(mycursor)
    #         mycursor.close()
    #         #self.assertEqual(fetchFlag,True)
    #         if fetchFlag:
    #             if myresult == None:
    #                 self.assertTrue(False)
    #             elif not myresult:
    #                 self.assertTrue(False)
    #         else:
    #             self.assertTrue(False)
    #     except Exception as ex:
    #         print("Fetch Job Error:\n" + str(ex))
    #         self.assertTrue(False)

    # def unload_data(self):
    #     try:
    #         result=delete_data_from_testDB()
    #         self.assertTrue(result)
    #     except Exception as ex:
    #         print("Delete data from testdb Error:\n" + str(ex))
    #         return False
