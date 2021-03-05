#!/usr/bin/env python3

import mysql.connector as conn
from time import sleep, time
from collections import deque
from pickle import dump, load

from .download import *
from .convert import *
from .upload import *


# Retrieve and claim jobs
def polling(trigger: bool, jobQueue: deque) -> bool:
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
        jobQueue.append(newJob)
        newJob.set_job(myresult)

        var = False
        if not download_src(newJob):
            print("Failed to download the source file.", newJob)
        elif not convert(newJob):
            print("Failed to convert the music.", newJob)
        elif not upload_score(newJob):
            print("Failed to upload the score.", newJob)
        else:
            var = True
            sleep(pollNormalDelay)
        
    if var:
        return True
    else:
        print("Polling system has terminated.")
        print("len(jobQueue) =", len(jobQueue))
        return False


if __name__ == '__main__':
    trigger = True
    jobQueue = deque()

    polling(trigger, jobQueue)

    if not os.path.exists("logs"):
        os.makedirs("logs")

    # Save the jobQueue
    logDir = "logs\\log_jobQueue_%s.pkl" %round(time())
    dump(jobQueue, open(logDir, "wb"), protocol=4)
    print("'jobQueue' has been saved:", jobQueue)
    print("Exited.")