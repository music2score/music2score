import mysql.connector as conn
from python.constants import *


def insert_data_into_testDB()-> bool:
    #insert data into testDB
    sqlSel = "SELECT * FROM jobs"
    try:
        dbObj = conn.connect(dbTest)
        mycursor = dbObj.cursor()
        mycursor.execute(sqlSel)
        myresult = mycursor.fetchone()
        if not myresult:
            sqlinsert="INSERT INTO jobs (jobid,filename,userid,processing,completed,date) VALUES (11,'sample.midi','user1',0,0,'1000-01-01 00:00:00')"
            mycursor.execute(sqlinsert)
            mycursor.execute("commit")
            mycursor.execute(sqlSel)
            myresult = mycursor.fetchone()
            mycursor.close()
            if not myresult:
                return False 
            else:
                return True   
    except Exception as ex:
            print("Insert data into testdb Error:\n" + str(ex))
            return False

def delete_data_from_testDB()-> bool:
    #delete rows from testDB
    
    try:
        dbObj = conn.connect(dbTest)
        mycursor = dbObj.cursor()
        sqldelete="DELETE FROM jobs"
        mycursor.execute(sqldelete)
        mycursor.execute("commit")
        sqlSel = "SELECT * FROM jobs"
        mycursor.execute(sqlSel)
        myresult = mycursor.fetchone()
        if not myresult:
            return True 
        else:
            return False    
    except Exception as ex:
            print("Delete data from testdb Error:\n" + str(ex))
            return False