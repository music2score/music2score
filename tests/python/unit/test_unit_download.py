from python.jobs import *
from python.download import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
import requests
import shutil

# Standard library imports...
from unittest.mock import Mock, patch


class TestDownload(TestCase):
  
    def test_status_200_error_in_response(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a error in response.
            stri="\x00"+"\x00"
            data=bytes(stri,'UTF-8')
            mock_post.return_value.status_code=200
            #mock_post.return_value=data
            mock_post.return_value.content=data
            mock_post.return_value.OK =True
            
            ret=download_src(mynewjob)
        self.assertFalse(ret)

    def test_status_200_good_response(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a error in response.
            stri="MThd"+"\x00"+"\x00"
            data=bytes(stri,'UTF-8')
            mock_post.return_value.status_code=200
            mock_post.return_value.content=data
            mock_post.return_value.OK =True
            
            ret=download_src(mynewjob)
            self.assertTrue(ret)

            retval=os.path.exists('/project/tests/python/1' +"/" + 'sample.mid')
            self.assertTrue(retval)
            if os.path.exists('/project/tests/python/1'):
                shutil.rmtree('/project/tests/python/1')
        
    def test_status_not_200(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a connection error.
            mock_post.side_effect = requests.exceptions.ConnectionError()
            ret=download_src(mynewjob)
        self.assertFalse(ret)