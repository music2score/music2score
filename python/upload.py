import os
import zipfile
import requests
from time import time, ctime

#from constants import *
#from jobs import *

try:
    from constants import * 
except ImportError:
    from python.constants import *
try: 
    from jobs import *             
except ImportError:
    from python.jobs import * 


"""
    Upload the sheet-score in .pdf and .png to file sharing system.
    Return  True   if the file is successfully uploaded and deleted locally.
    Return  False  if this function failed to upload.

    This function makes POST request to php API. 
    The request is in json format. 
        It contains 'form' and 'files' as keys.
        The value of 'form' is a dictionary of 'server_id', 'server_key', 'jobno'.
        The value of 'files' is a dictionary of two files.
    The response message is not defined.
"""
def upload_score(newJob: JOB, urlUp: str) -> bool:

    # Zip the png files
    png2zip(newJob.filename, newJob.localFilePath())

    # For testing
    print()
    os.system("ls -lh %s" %newJob._directory())

    # Check if the upload files are too large for php API
    if not check_size(newJob.localFilePath()):
        print("Upload Refused:\n  Files are larger than %s MB."% upSize_limit)
        newJob._del_files()
        return False

    args = {"server_id": server_id, 
            "server_key": server_key,
            "jobno": newJob.jobid
            }

    files = {"file_pdf": open(newJob.localFilePath() + ".pdf", "rb"), 
             "file_png": open(newJob.localFilePath() + ".zip", "rb")}

    # Upload .pdf and .png files
    try:
        staTime = time()
        r = requests.post(urlUp + "/post", 
                          data = args, 
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
    
    # For testing
    print("\n", r.content)

    # Delete local files and record upload information
    newJob.upload_done(ctime(), endTime - staTime)

    return True


# Zip several png files
def png2zip(fileName: str, zipPath: str):

    # files = list(filter(lambda x: x[-4:] == '.png', os.listdir(path)))
    files = os.listdir(zipPath)

    with zipfile.ZipFile(zipPath + ".zip", 'w') as zp:
        for fpng in files:
            zp.write(zipPath + "/" + fpng, fileName + "/" + fpng)


"""
    Check the size of upload files
    Return  True   if they are allowed
    Return  False  if they exceed the limit
"""
def check_size(filePath: str) -> bool:
    fSize = os.path.getsize(filePath + ".pdf") + os.path.getsize(filePath + ".zip")
    return fSize < upSize_limit * 2 ** 20