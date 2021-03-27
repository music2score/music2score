from python.jobs import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
from python.convert import *
import shutil
from unittest.mock import Mock, patch
import subprocess

class TestConvert(TestCase):

    def setUp(self):
        #create a folder named 1 under tests/python and have .pdf and .zip in it
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
        #remove the folder named 1 under tests/python after the test completed
        mypath='/project/tests/python/1'
        if os.path.exists(mypath):
            shutil.rmtree(mypath)
        ret=os.path.exists(mypath)
        self.assertFalse(ret)
    
    def test_convert(self):
        #Check if midi is converted to png and pdf files properly
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        ret=convert(mynewjob)
        self.assertEqual(ret,True)

        lyFile=os.path.exists('/project/tests/python/1' +"/" + 'sample.ly')
        self.assertTrue(lyFile)
        pngfile=os.path.exists('/project/tests/python/1/sample' +"/" + 'sample-page1.png')
        self.assertTrue(pngfile)

class TestConvertFailure(TestCase):
    def test_convert_subprocess_failure(self):
        with patch('python.convert.subprocess.run') as mock_subprocess:
            # Configure the mock with connection error.
            mynewjob = JOB()
            myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
            mynewjob.set_job(myrestuple)
            mock_subprocess.side_effect = subprocess.CalledProcessError(returncode=2,cmd=["bad"])
            ret=convert(mynewjob)
        self.assertFalse(ret)

