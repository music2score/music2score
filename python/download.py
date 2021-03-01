import requests

from .constants import *
from .jobs import *


def download_src(newJob: JOB) -> bool:
    # Test connection
    try:
        r = requests.get(url_fShare, timeout = timeOut_connect)
        r.raise_for_status()    # check if status == 200
    except Exception as ex:
        print("Request Error:\n" + str(ex))
        return False
    
    args = {"jobid": newJob.jobid, "filename": newJob.filename}
    
    # Download the source file
    try:
        r = requests.post(url_fShare + "/post", 
                          params = args, 
                          timeout = (timeOut_connect, timeOut_read)
                          )
    except Exception as ex:
        print("Download Error:\n" + str(ex))
        return False

    # Post succeeded, but server returns errormsg
    if "errormsg" in r.json():
        print("ErrorMsg from php server:", r.json()["errormsg"])
        return True

    newJob.create_dir()

    # Save as a local file
    midiName = newJob.localFilePath() + ".mid"
    with open(midiName, "wb") as fh:
        fh.whrite(r.json()["files"]["src"])
        newJob.set_file('mid')
    
    return True