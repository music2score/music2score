# from python.download import *
# from python.jobs import *
# from python.constants import *
# from python.convert import *
# import os.path
# from os import path
# import unittest
# from unittest import TestCase
# import mysql.connector as conn

# class TestDownload(TestCase): 
#     def test_download_src(self):
#         #myresult=(11,'sample.midi','user1',0,0,'1000-01-01 00:00:00')
#         try:
#             mydbobj = conn.connect(db)
#             mycursor = mydbobj.cursor()
#             fetchFlag, myresult = fetch_job(mycursor)
#             mycursor.close()
#             if fetchFlag:
#                 if myresult==None:
#                     self.assert_(True)
#                 else:
#                     newJob = JOB()
#                     newJob.set_job(myresult)
#                     result1=download_src(newJob)
#                     self.assertEqual(result1,True)
#                     downloadedFile=newJob.localFilePath()
#                     fileexists=path.exists(downloadedFile+".mid")
#                     self.assertEqual(fileexists,True)
#             else:
#                 self.assert_(False) 
#         except Exception as ex:
#             print("Download Error:\n" + str(ex))
#             self.assert_(False)
        
        
