# Constants

pollNormalDelay = 1     # sleep duration after a polling round (s)
pollEmptyDelay = 5      # sleep duration if no job remained in database (s)

dbTest = {"host": "mysql_server",
          "user": "root",
          "password": "12345",
          "database": "music2score_test",
          "autocommit": False
          }

dbLocal = {"host": "localhost",
           "user": "root",
           "password": "123456",
           "database": "test0",
           "autocommit": False
          }

# # URL of file sharing system
# url_fShare = "https://api.github.com/events"