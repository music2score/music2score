import mysql.connector as conn
import os


class JOB(object):
    def __init__(self):
        # Information of a job
        self.jobid = None
        self.filename = None
        self.upTime = None
        # State of corresponding file type
        self.sourceFile = False
        self.pdf = False
        self.png = False

    def __repr__(self) -> str:
        ret = "jobid: " + str(self.jobid)
        ret += "\\nfilename: " + self.filename
        ret += "\\nupTime: " + self.upTime
        ret += "\\nsrc: " + str(self.sourceFile)
        ret += "\\npdf: " + str(self.pdf)
        ret += "\\npng: " + str(self.png)
        return ret

    # Set the information. 
    # Return False if no job remained on server.
    def set_job(self, myresult: tuple) -> bool:
        self._clear()
        if myresult:
            self.jobid, self.filename = myresult[:2]
            return True
        else:
            return False

    # Set the state if corresponding file is ready. 
    def set_file(self, *fileType):
        for arg in fileType:
            if arg.lower() in ['sorce', 'sorcefile', 'mid', 'midi']:
                self.sourceFile = True
            elif arg.lower() == 'pdf':
                self.pdf = True
            elif arg.lower() == 'png':
                self.png = True

    # Delete local files and set the upload time. 
    def upload_done(self, upTime: str):
        self._del_files()
        self.upTime = upTime

    def _path(self) -> str:
        return '.\\' + str(self.jobid)

    def _clear(self):
        self._del_files()
        self.jobid = None
        self.filename = None
        self.upTime = None

    def _del_files(self) -> bool:
        self.sourceFile = False
        self.pdf = False
        self.png = False

        # Delete local files
        path = self._path()
        if os.path.exists(path):
            os.removedirs(path)
            return True
        else:
            return False


# Fetch a waiting job from MySQL. 
# Retrun (True, <tuple>) if succeed;
# Return (True, None) if no job remained;
# Return (False, None) if failed. 
def fetch_job(mycursor: conn.cursor.MySQLCursor) -> (bool, tuple):
    sqlSel = "SELECT * FROM jobs WHERE processing != %s AND completed != %s LIMIT %s FOR UPDATE"
    sqlUpd = "UPDATE jobs SET processing = %s WHERE jobid = %s"
    paraSel = (1, 1, 1)

    try:
        mycursor.execute(sqlSel, paraSel)
        myresult = mycursor.fetchone()
    except conn.Error as ex:
        print('Failed to find a job. {}'.format(ex))
        return False, None
    
    # Fetched successfully. No job remained
    if myresult == None:
        mycursor.execute("commit")
        return True, None

    paraUpd = (1, myresult[0])
    try:
        mycursor.execute(sqlUpd, paraUpd)
        rowCnt = mycursor.rowcount  # for testing
        mycursor.execute("commit")
    except conn.Error as ex:
        print('Failed to mark the fetched job. {}'.format(ex))
        return False, None

    # For testing, will be able to be removed
    if rowCnt == 1:
        return True, myresult 
    else:
        print('Error: rowCnt != 1.')
        return False, None