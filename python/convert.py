import subprocess
from .jobs import *


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

    newJob.set_file('png', 'pdf')
    return True
