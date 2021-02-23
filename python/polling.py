from time import sleep
from collections import deque

from .constants import *
from .jobs import *
from .download import *
from .convert import *
from .upload import *


# Retrieve and claim jobs
def polling(jobList: deque) -> bool:
    mydb = conn.connect(dbTest)

    var = True
    while var:
        mycursor = mydb.cursor()
        fetchFlag, myresult = fetch_job(mycursor)
        mycursor.close()

        if not fetchFlag:
            return False
        elif not myresult:
            sleep(pollEmptyDelay)
            continue
        
        newJob = JOB()
        jobList.append(newJob)
        newJob.set_job(myresult)

        var = False
        if not download_src():
            print("Failed to download the source file.", newJob)
        elif not convert():
            print("Failed to convert the music.", newJob)
        elif not upload_score():
            print("Failed to upload the score.", newJob)
        else:
            var = True
            sleep(pollNormalDelay)
        
    print("Polling system has terminated.")
    print("len(jobList) =", len(jobList))
    return False