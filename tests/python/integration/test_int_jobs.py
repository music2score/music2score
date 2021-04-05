# from python.jobs import *
# from python.constants import *
# import unittest
# from unittest import TestCase
# import mysql.connector as conn

# class TestFetchJob(TestCase): 
#     def test_fetch_job(self):
#         try:
#             mydbobj = conn.connect(db)
#             mycursor = mydbobj.cursor()
#             fetchFlag, myresult = fetch_job(mycursor)
#             mycursor.close()
#             #self.assertEqual(fetchFlag,True)
#             if fetchFlag:
#                 if myresult == None:
#                     self.assertTrue(True)
#                 elif not myresult:
#                     self.assertTrue(False)
#             else:
#                 self.assertTrue(False)
#         except Exception as ex:
#             print("Fetch Job Error:\n" + str(ex))
#             self.assertTrue(False)