#!/usr/bin/env python3

import mysql.connector as conn
from time import sleep, time
from collections import deque
from pickle import dump, load
from copy import deepcopy as cp

from constants import *
from download import *
from convert import *
from upload import *


# Retrieve and claim jobs
def polling(trigger: bool, jobQueue: deque, 
            mydb, urlDown: str, urlUp: str) -> bool:

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
        if not download_src(newJob, urlDown):
            print("Failed to download the source file.", newJob)
        elif not convert(newJob):
            print("Failed to convert the music.", newJob)
        elif not upload_score(newJob, urlUp):
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


"""
    Adapt to different conventions for host name
    Return a tuple contains 3 elements:
    --- mydb
        mysql.connector.connection.MySQLConnection class variable
    --- urlDown
        URL for connecting with the download API
    --- urlUp
        URL for connecting with the upload API
"""
def env_connect():

    dbAttempt = cp(db)
    
    try:
        dbAttempt["host"] = hostDocker
        mydb = conn.connect(**dbAttempt)
        urlDown, urlUp = url_Docker_download, url_Docker_upload
    except:
        dbAttempt["host"] = hostKuber
        mydb = conn.connect(**dbAttempt)
        urlDown, urlUp = url_Kuber_download, url_Kuber_upload
    
    print("MySQL Host Name:", dbAttempt["host"])
    return mydb, urlDown, urlUp


if __name__ == '__main__':
    trigger = True
    jobQueue = deque()

    mydb, urlDown, urlUp = env_connect()

    polling(trigger, jobQueue, mydb, urlDown, urlUp)

    if not os.path.exists("logs"):
        os.makedirs("logs")

    # Save the jobQueue
    logDir = "logs/log_jobQueue_%s.pkl" %round(time())
    dump(jobQueue, open(logDir, "wb"), protocol=4)
    print("'jobQueue' has been saved:", jobQueue)
    print("Exited.")