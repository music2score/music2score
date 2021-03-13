class MyDB:
    def __init__(self):
        self.connection = Connection()

    def connect(self, connection_string):
        return self.connection


class Connection:
    def __init__(self):
        self.cur = Cursor()

    def cursor(self):
        return self.cur

    def close(self):
        pass


class Cursor():
    def execute(self, query,params=None):
        if query == "select id from employee_db where name=John":
            return 123
        elif query == "SELECT * FROM jobs WHERE processing != %s AND completed != %s LIMIT %s FOR UPDATE":
            return True,(11,'sample.midi','user1',0,0,'1000-01-01 00:00:00')
        elif query == "UPDATE jobs SET processing = %s WHERE jobid = %s":
            return True
        elif query == "commit":
            return True
        else:
            return -1
    def fetchone(self):
        return (11,'sample.midi','user1',0,0,'1000-01-01 00:00:00')
    def close(self):
        pass
class mysql():
    def __init__(self):
        pass