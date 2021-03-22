import os
import subprocess
#from .jobs import *

try:
    from python.jobs import *               
except ImportError:
    from jobs import *

def convert(newJob: JOB) -> bool:
    midiName = newJob.localFilePath() + ".mid"
    lyName = newJob.localFilePath() + ".ly"

    cmd1 = "midi2ly " + midiName + " -o " + lyName
    cmd2 = "lilypond -fpng " + lyName
    cmd3 = "lilypond -fpdf " + lyName
    cmd = cmd1 + "; " + cmd2 + "; " + cmd3
    try:
        subprocess.run(cmd, shell=True, check=True)
    except subprocess.CalledProcessError as e:
        print("stderr: ", e.stderr)
        return False

    temName = newJob.filename
    os.system("mv %s*.??? %s.midi %s/" %(temName , temName, newJob._directory()))
    
    # # Adapt to the php API
    # pngFiles = list(filter(lambda x: x[-4:] == '.png', os.listdir(newJob._directory())))
    # if len(pngFiles) == 1:
    #     os.rename(newJob.localFilePath() + ".png", newJob.localFilePath() + "page1.png")
    #     pngFiles = [newJob.filename + "page1.png"]
    
    pngFolder = newJob._directory() + "/" + newJob.filename
    os.makedirs(pngFolder)
    os.system("mv %s/*.png %s" %(newJob._directory(), pngFolder))
    
    # For debugging
    print("\ndir ./")
    os.system("dir")                    # ./

    # # For debugging
    temID = str(newJob.jobid)
    # print("\ndir ./%s" %temID)
    # os.system("dir ./%s" %temID)        # ./jobid/
    print("\nls -lh ./%s" %temID)
    os.system("ls -lh ./%s" %temID)     # ./jobid/
    print()
    print("\nls -lh ./%s/%s" %(temID, newJob.filename))
    os.system("ls -lh ./%s/%s" %(temID, newJob.filename))     # ./jobid/filename/

    newJob.set_file('png', 'pdf')
    return True
