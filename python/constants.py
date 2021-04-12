# Constants

pollNormalDelay = 1     # sleep duration after a polling round (s)
pollEmptyDelay = 5      # sleep duration if no job remained in database (s)

timeOut_connect = 3.05
timeOut_read = 15.05


hostDocker = "mysql_server"
hostKuber = "mysql-server"

db = {"user": "root",
      "password": "12345",
      "database": "music2score_test",
      "autocommit": False
      }
          
dbTest = {"user": "root",
          "password": "12345",
          "database": "testdb",
          "autocommit": False
          }

# Upper-bound size of uploaded files (MB)
upSize_limit = 100

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

class Backend_Data():
      def __init__(self):
            
            # Constants

            self.pollNormalDelay = 1     # sleep duration after a polling round (s)
            self.pollEmptyDelay = 5      # sleep duration if no job remained in database (s)

            self.timeOut_connect = 3.05
            self.timeOut_read = 15.05


            self.hostDocker = "mysql_server"
            self.hostKuber = "mysql-server"

            self.db = {"user": "root",
                       "password": "12345",
                       "database": "music2score_test",
                       "autocommit": False
                       }
                  
            self.dbTest = {"user": "root",
                           "password": "12345",
                           "database": "testdb",
                           "autocommit": False
                           }

            # Upper-bound size of uploaded files (MB)
            self.upSize_limit = 100

            # URLs for file sharing system
            self.url_fShare = "http://httpbin.org/post"

            self.url_Docker_download = "http://apache_server/api/download_api.php"
            self.url_Docker_upload = "http://apache_server/api/upload_api.php"

            self.url_Kuber_download = "http://apache-server/api/download_api.php"
            self.url_Kuber_upload = "http://apache-server/api/upload_api.php"

            # Parameters for Download API
            self.server_id = "mid_1c23kk567303ui37"
            self.server_key = "bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873" + \
                              "jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyu" + \
                              "iuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw42" + \
                              "34fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurw" + \
                              "ehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e"

            def get_poll_normal_delay(self):
                  return self.pollNormalDelay

            def get_poll_empty_delay(self):
                  return self.pollEmptyDelay

            def get_timeout_connect(self):
                  return self.timeOut_connect

            def get_timeout_read(self):
                  return self.timeOut_read

            def get_host_docker(self):
                  return self.hostDocker
            
            def get_host_kuber(self):
                  return self.hostKuber

            def get_db(self):
                  return self.db

            def get_dbTest(self):
                  return self.dbTest

            def get_up_size_limit(self):
                  return self.upSize_limit

            def get_url_fshare(self):
                  return self.url_fShare

            def get_url_docker_download(self):
                  return self.url_Docker_download

            def get_url_docker_upload(self):
                  return self.url_Docker_upload

            def get_url_kuber_download(self):
                  return self.url_Kuber_download

            def get_url_kuber_upload(self):
                  return self.url_Kuber_upload

            def get_server_id(self):
                  return self.server_id

            def get_server_key(self):
                  return self.server_key
