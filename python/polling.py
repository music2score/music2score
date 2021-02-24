#!/usr/bin/env python3

from time import sleep, time
from collections import deque
from pickle import dump, load

from .download import *
from .convert import *
from .upload import *


# Retrieve and claim jobs
def polling(trigger: bool, jobList: deque) -> bool:
    mydb = conn.connect(dbTest)

    var = True
    while trigger and var:
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
        elif not upload_score(newJob, mydb):
            print("Failed to upload the score.", newJob)
        else:
            var = True
            sleep(pollNormalDelay)
        
    if var:
        return True
    else:
        print("Polling system has terminated.")
        print("len(jobList) =", len(jobList))
        return False


if __name__ == '__main__':
    trigger = True
    jobList = deque()

    polling(trigger, jobList)

    if not os.path.exists("logs"):
        os.makedirs("logs")

    # Save the jobList
    logDir = "logs\\log_jobList_%s.pkl" %round(time())
    dump(jobList, open(logDir, "wb"), protocol=4)
    print("'jobList' has been saved:", jobList)
    print("Exited.")