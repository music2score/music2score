from os import stat
import requests
from time import time, ctime

from .constants import *
from .jobs import *

"""
    Upload the sheet-score in .pdf and .png to file sharing system.
    Return  True  if the file is successfully uploaded and deleted locally.
    Return  False  if this function failed to upload.

    This function makes POST request to php API. 
    The request is in json format. 
        It contains 'args' and 'files' as keys.
        The value of 'args' is a dictionary of 'jobno'.
        The value of 'files' is a dictionary of two files.
    The response message is not defined.
"""
def upload_score(newJob: JOB) -> bool:

    args = {"jobno": newJob.jobid}

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
        r.raise_for_status()    # check if status == 200
    except Exception as ex:
        print("Upload Error:\n" + str(ex))
        return False
    finally:
        for fh in list(files.values()):
            fh.close()
    
    # Delete local files and record upload information
    newJob.upload_done(ctime(), endTime - staTime)

    return True