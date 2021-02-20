import mysql.connector
import subprocess
import time

mydb = mysql.connector.connect(
  host="mysql_server",
  user="root",
  password="12345",
  database="music2score_test",
  autocommit=True
)

var = 1
while var == 1 :
    #Checks for jobs
    mycursor = mydb.cursor()

    mycursor.execute("SELECT * FROM jobs WHERE processing!=1 AND completed!=1 LIMIT 1")

    myresult = mycursor.fetchall()

    mycursor.close()
    #Updates Processing
    sql=""
    for x in myresult:
        sql = "UPDATE jobs SET processing = 1 WHERE jobid = "+str(x[0])
        
        mycursor = mydb.cursor()

        mycursor.execute(sql)

        mydb.commit()
        
        mycursor.close()

        #Calls API
        cmd = ['python', './python/download.py']
        subprocess.Popen(cmd).wait()

        cmd = ['python', './python/convert.py']
        subprocess.Popen(cmd).wait()

        cmd = ['python', './python/upload.py']
        subprocess.Popen(cmd).wait()

    time.sleep(10)