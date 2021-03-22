from python.jobs import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
from python.upload import *
import os
import shutil

class TestUpload(TestCase):
   
    def setUp(self):
        #create a folder named 1 under tests/python and have .pdf and .zip in it
        mypath='/project/tests/python/1/sample'
        try:
            if os.path.exists('/project/tests/python/1'):
                shutil.rmtree('/project/tests/python/1')
            os.mkdir('/project/tests/python/1')
            os.mkdir(mypath)
            shutil.copytree('/project/tests/python/test_data/samplefiles',mypath, dirs_exist_ok=True)
        except OSError as error:  
            print(error)
            assert False
       

    def tearDown(self):
        #remove the folder named 1 under tests/python after the test completed
        mypath='/project/tests/python/1'
        shutil.rmtree(mypath)
        ret=os.path.exists(mypath)
        self.assertFalse(ret)

    def test_pngZip(self):
        #Check if given PNG files are zipped properly
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)

        print(mynewjob.localFilePath())   #must check the value returned from this '/' is missing at _cwd
        #check if .zip file is created in the specified directory
        png2zip(mynewjob.filename,mynewjob.localFilePath())
        ret=os.path.exists('/project/tests/python/1' +"/" + 'sample.zip')
        self.assertEqual(True,ret)
        #Remove the .zip file and check if it is removed
        '''
        os.remove(mynewjob.localFilePath()+"/" + '.zip')
        ret=os.path.exists(mynewjob.localFilePath()+"/" + '.zip')
        self.assertEqual(False,ret)
        '''
    
    #def test_upload(self):
        #pass

        