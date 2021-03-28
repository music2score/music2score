import mysql.connector

mydb = mysql.connector.connect(
            host="mysql-server",
            user="root",
            password="12345",
            database="music2score"
        )

mydb.is_connected()