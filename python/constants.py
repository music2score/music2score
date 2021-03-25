# Constants

pollNormalDelay = 1     # sleep duration after a polling round (s)
pollEmptyDelay = 5      # sleep duration if no job remained in database (s)

timeOut_connect = 3.05
timeOut_read = 15.05

db = {"host": "mysql_server",
          "user": "root",
          "password": "12345",
          "database": "music2score_test",
          "autocommit": False
          }
          
dbTest = {"host": "mysql_server",
          "user": "root",
          "password": "12345",
          "database": "testdb",
          "autocommit": False
          }

dbLocal = {"host": "localhost",
           "user": "root",
           "password": "123456",
           "database": "test0",
           "autocommit": False
          }

# URL of file sharing system
url_fShare = "http://httpbin.org/post"

# url_fShare_download = "http://apache_server/api/download_api.php"
# url_fShare_upload = "http://apache_server/api/upload_api.php"

url_Docker_download = "http://apache_server/api/download_api.php"
url_Docker_upload = "http://apache_server/api/upload_api.php"

url_Kuber_download = "http://apache-server/api/download_api.php"
url_Kuber_upload = "http://apache-server/api/upload_api.php"

# Parameters for Download API
server_id = "mid_1c23kk567303ui37"
server_key = "bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e"