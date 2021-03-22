import requests

#from constants import *
#from jobs import *
try:
    from python.constants import * 
except ImportError:
    from constants import *
try: 
    from python.jobs import *             
except ImportError:
    from jobs import *   

"""
    Download the source file of music from file sharing system.
    Return  True  if the file is successfully downloaded and saved locally.
    Return  False  if this function failed to download.

    This function makes POST request to php API. 
    The request is in json format. 
        It contains 'form' as a key.
        The value of 'form' is a dictionary of 'server_id', 'server_key', 'jobno'.
    The response message is either a bitstream of the file, 
    or an errormsg in json format.
"""
def download_src(newJob: JOB) -> bool:
    
    args = {"server_id": server_id, 
            "server_key": server_key,
            "jobno": newJob.jobid
            }
    
    # Download the source file
    try:
        r = requests.post(url_fShare_download + "/post", 
                          data = args, 
                          timeout = (timeOut_connect, timeOut_read)
                          )
        r.raise_for_status()    # check if status == 200
    except Exception as ex:
        print("Download Error:\n" + str(ex))
        return False

    # For debugging
    print()
    print(len(r.content))
    print(r.content[:4])
    print(r.content[:4] == b"MThd")

    # Post succeeded, but php server returns errormsg
    if r.content[:4] != b"MThd":
        print("ErrorMsg from php server:", r.json()["errormsg"])
        return False

    newJob.create_dir()

    # Save as a local file
    midiName = newJob.localFilePath() + ".mid"
    with open(midiName, "wb") as fh:
        fh.write(r.content)
        newJob.set_file('mid')
    
    return True