import os
import zipfile
import requests
# from PIL import Image
from time import time, ctime

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
    Upload the sheet-score in .pdf and .png to file sharing system.
    Return  True  if the file is successfully uploaded and deleted locally.
    Return  False  if this function failed to upload.

    This function makes POST request to php API. 
    The request is in json format. 
        It contains 'form' and 'files' as keys.
        The value of 'form' is a dictionary of 'server_id', 'server_key', 'jobno'.
        The value of 'files' is a dictionary of two files.
    The response message is not defined.
"""
def upload_score(newJob: JOB) -> bool:

    # Zip the png files
    png2zip(newJob.filename, newJob.localFilePath())

    # # Join the png files as one
    # png_join(newJob._directory(), newJob.localFilePath())

    # For testing
    print()
    os.system("ls -lh %s" %newJob._directory())

    args = {"server_id": server_id, 
            "server_key": server_key,
            "jobno": newJob.jobid
            }

    files = {"file_pdf": open(newJob.localFilePath() + ".pdf", "rb"), 
             "file_png": open(newJob.localFilePath() + ".zip", "rb")}

    # Upload .pdf and .png files
    try:
        staTime = time()
        r = requests.post(url_fShare_upload + "/post", 
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


# # Join several png files as one
# def png_join(path: str, pngPath: str):

#     files = list(filter(lambda x: x[-4:] == '.png', os.listdir(path)))
#     if len(files) <= 1:
#         return

#     # Sort the pages of png in the right order
#     files.sort(key = lambda x: int(x[:-4].split("page")[-1]))
#     pngList = [Image.open(fpng) for fpng in files]

#     width, height = pngList[0].size

#     pngOut = Image.new(pngList[0].mode, (width, height * len(pngList)))

#     for i, image in enumerate(pngList):
#         pngOut.paste(image, box=(0, i * height))

#     pngOut.save(pngPath + ".png")


# Zip several png files
def png2zip(fileName: str, zipPath: str):

    # files = list(filter(lambda x: x[-4:] == '.png', os.listdir(path)))
    files = os.listdir(zipPath)

    with zipfile.ZipFile(zipPath + ".zip", 'w') as zp:
        for fpng in files:
            zp.write(zipPath + "/" + fpng, fileName + "/" + fpng)