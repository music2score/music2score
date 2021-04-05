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