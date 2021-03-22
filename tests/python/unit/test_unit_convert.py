from python.jobs import *
import mysql.connector
import datetime
import unittest
from unittest import TestCase
from python.convert import *

class TestConvert(TestCase):
   
    def test_convert(self):
        #Check if midi is converted to png and pdf files properly
        mynewjob = JOB()
        myrestuple=(1, 'sample', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0))
        mynewjob.set_job(myrestuple)

        ret=convert(mynewjob)
        self.assertEqual(ret,True)
