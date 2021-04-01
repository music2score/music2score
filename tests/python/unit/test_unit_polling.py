from python.polling import *
from python.jobs import *
import unittest
from unittest import TestCase
from unittest.mock import Mock, patch
from collections import deque
import mysql.connector
import datetime

class TestPolling(TestCase):
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
  
  def test_polling_fetch_job_failure(self):
    trigger = True
    jobQueue = deque()
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"

    with patch('python.polling.fetch_job') as mock_fetch:
      #mock_fetch = Mock(side_effect=[(False, ()), (True, (1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0)))])
      mock_fetch.return_value=(False,())
      ret=polling(trigger, jobQueue, self.mydb, urlDown, urlUp)
    self.assertFalse(ret)
  
  def test_polling_download_failure(self):
    trigger = True
    jobQueue = deque()
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"

    with patch('python.polling.fetch_job') as mock_fetch, patch('python.polling.download_src') as mock_download:
      mock_fetch.return_value=(True,(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0)))
      mock_download.return_value=False
      ret=polling(trigger, jobQueue, self.mydb, urlDown, urlUp)
    self.assertFalse(ret)

  def test_polling_convert_failure(self):
    trigger = True
    jobQueue = deque()
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"

    with patch('python.polling.fetch_job') as mock_fetch, patch('python.polling.download_src') as mock_download, patch('python.polling.convert') as mock_convert:
      mock_fetch.return_value=(True,(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0)))
      mock_download.return_value=True
      mock_convert.return_value=False
      ret=polling(trigger, jobQueue, self.mydb, urlDown, urlUp)
    self.assertFalse(ret)
  
  def test_polling_upload_failure(self):
    trigger = True
    jobQueue = deque()
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"

    with patch('python.polling.fetch_job') as mock_fetch, patch('python.polling.download_src') as mock_download, patch('python.polling.convert') as mock_convert, patch('python.polling.upload_score') as mock_upload:
      mock_fetch.return_value=(True,(1, 'sample.mid', 1, 0, 0, datetime.datetime(2021, 3, 23, 0, 0)))
      mock_download.return_value=True
      mock_convert.return_value=True
      mock_upload.return_value=False
      ret=polling(trigger, jobQueue, self.mydb, urlDown, urlUp)
    self.assertFalse(ret)
  
  def test_trigger_false(self):
    trigger = False
    jobQueue = deque()
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"

    ret=polling(trigger, jobQueue, self.mydb, urlDown, urlUp)
    self.assertTrue(ret)
  '''
  def test_env_connect(self):
    dbtest = {
            "user": "root",
            "password": "12345",
            "database": "music2score_test",
            "autocommit": False}
    urlDown ="dummydownurl"
    urlUp ="dummyupurl"
    with patch('python.polling.conn.connect') as mock_conn:
            # Configure the mock with connection error.
            #mock_conn.side_effect = mysql.connector.Error()
            mock_conn = Mock(side_effect=[mysql.connector.Error(), mysql.connector.connect(dbtest)])
            #mock_conn.side_effect = Exception('Data')
            #mock_conn.return_value=
            #mydb, urlDown, urlUp = env_connect(dbtest)
            env_connect(dbtest)
            #env_connect.return_value=dbtest,urlDown,urlUp


            # self.assertFalse(ret)
  '''
