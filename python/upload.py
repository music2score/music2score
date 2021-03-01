import requests
from time import time, ctime

from .constants import *
from .jobs import *


def upload_score(newJob: JOB, mydb: conn.connection.MySQLConnection) -> bool:
    # Test connection
    try:
        r = requests.get(url_fShare, timeout = timeOut_connect)
        r.raise_for_status()    # check if status == 200
    except Exception as ex:
        print("Request Error:\n" + str(ex))
        return False

    args = {"jobid": str(newJob.jobid)}

    files = {"pdf": open(newJob.localFilePath() + ".pdf", "rb"), 
             "png": open(newJob.localFilePath() + ".png", "rb")}

    # Upload .pdf and .png files
    try:
        staTime = time()
        r = requests.post(url_fShare + "/post", 
                          params = args, 
                          files = files, 
                          timeout = (timeOut_connect, timeOut_read)
                          )
        endTime = time()
    except Exception as ex:
        print("Upload Error:\n" + str(ex))
        return False
    finally:
        for fh in list(files.values()):
            fh.close()
    
    # Delete local files and record upload information
    newJob.upload_done(ctime(), staTime - endTime)

    # Set the 'completed' state in MySQL
    mycursor = mydb.cursor()
    compFlag = complete_job(mycursor, newJob.jobid)
    mycursor.close()

    return compFlag