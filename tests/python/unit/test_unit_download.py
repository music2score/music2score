from python.jobs import *
from python.download import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
import requests

# Standard library imports...
from unittest.mock import Mock, patch


class TestDownload(TestCase):
  
    def test_status_200_error_in_response(self):
        pass

    def test_status_200_good_response(self):
        pass
    
    def test_status_not_200(self):
        mynewjob = JOB()
        myrestuple=(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)
        with patch('python.download.requests.post') as mock_post:
            # Configure the mock with a connection error.
            mock_post.side_effect = requests.exceptions.ConnectionError()
            ret=download_src(mynewjob)
        self.assertFalse(ret)