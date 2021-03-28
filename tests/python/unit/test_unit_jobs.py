from tests.python.data_handling_testdb import *
from python.jobs import *
from python.constants import *
import unittest
from unittest import TestCase

class TestJobs(TestCase): 
    def load_data(self):
        try:
            result=insert_data_into_testDB()
            self.assertTrue(result)
        except Exception as ex:
            print("Insert data into testdb Error:\n" + str(ex))
            return False
    
    def test_fetchjob(self):
        try:
            mydbobj = conn.connect(dbTest)
            mycursor = mydbobj.cursor()
            fetchFlag, myresult = fetch_job(mycursor)
            mycursor.close()
            #self.assertEqual(fetchFlag,True)
            if fetchFlag:
                if myresult == None:
                    self.assertTrue(False)
                elif not myresult:
                    self.assertTrue(False)
            else:
                self.assertTrue(False)
        except Exception as ex:
            print("Fetch Job Error:\n" + str(ex))
            self.assertTrue(False)

    def unload_data(self):
        try:
            result=delete_data_from_testDB()
            self.assertTrue(result)
        except Exception as ex:
            print("Delete data from testdb Error:\n" + str(ex))
            return False
