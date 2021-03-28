import mysql.connector

mydb = mysql.connector.connect(
            host="mysql-server",
            user="root",
            password="12345",
            database="music2score"
        )

mydb.is_connected()
print(mydb.is_connected())

# sql = "INSERT INTO jobs (jobid, filename, userid, processing, completed, date) \
#                VALUES (%s, %s, %s, %s, %s, %s)"
# vals = (1, 'sample.mid', 1, 0, 0, '2021-03-23')
# mydb.mycursor.execute(sql, vals)
# mydb.commit()

sql = "show databases"
mydb.mycursor.execute(sql, vals)
mydb.commit()

ans = mydb.mycursor.fetchone()
print(ans)