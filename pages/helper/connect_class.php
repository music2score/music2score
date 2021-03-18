<?php
/* 
Documentation

    Class:
    1. Connectors - used to encapsulate connection process.
	2. Auth - used to encapsulate authorization process. [Not Authentication]

    Data Members:
	
	- Connectors
	1. $dbname - used for storing database name.
	2. $username - used for storing database user name.
	3. $password - used for storing database password.

	- Auth
	1. $email - used for storing email of the logged in user.
	2. $fname - used for storing first name of the logged in user.
	3. $lname - used for storing last name of the logged in user.
	4. $email - used for storing email of the logged in user.
	5. $status - used for storing the status of authorization.
	
	Member Functions:
	
	- Connectors
    1. Connectors->phptodbconnector - connects mysql database with php pdo.
	
	- Auth
	1. Auth->authenticate($_SESSION,$db) - Tries to authenticate user with the database, returns false only for database based failure otherwise
    returns true irrespective of authentication success or failure.
    2. Auth->getErrorTxt() - Returns errortxt if authentication process encounters a database bound issue otherwise return empty string irrespective
    of authentication success or failure.
	3. Auth->is_authenticated() - Returns the true if user is logged in, otherwise returns false.
    4. Auth->getFirstName() - Returns the first name of the logged in user, if a user is not logged in returns empty string.
    5. Auth->getLastName() - Returns the last name of the logged in user, if a user is not logged in returns empty string.
    6. Auth->getEmail() - Returns the email address of the logged in user, if a user is not logged in returns empty string.
	
*/
Class Connectors{
	private $dbname="music2score_test";
	private $username="root";
	private $password="12345";
	
	function phptodbconnector(){
		try{
			//$db = new PDO('mysql:host='.$_SERVER['REMOTE_ADDR'].';dbname=music2score_test;charset=utf8','root','12345'); 
			$db = new PDO('mysql:host=mysql-server;port=3306;dbname='.$this->dbname.';charset=utf8',$this->username,$this->password);
		}
		catch(Exception $e){
			return false;
		}
		return $db;
	}
}

class Auth{
    private $email="";
	private $fname="";
	private $lname="";
	private $errortxt="";
	private $status=false;

	public function authenticate($session,$db){
		if($db!=false){
			if(isset($session['fname'])&&isset($session['lname'])&&isset($session['email'])){
				$query=$db->prepare("SELECT * FROM user WHERE email=:email");
				$query->bindParam(":email",$session['email']);
				$query->execute();
				$row=$query->rowCount();
				if($row==0){
					$this->fname="";
					$this->lname="";
					$this->email="";
					$this->errortxt="Database Error: Cannot find user records.";
					$this->status=false;
					return false;
				}
				$this->fname=$session["fname"];
				$this->lname=$session["lname"];
				$this->email=$session["email"];

				$this->errortxt="";
				$this->status=true;
				return true;
			}else{
				$this->fname="";
				$this->lname="";
				$this->email="";
				$this->errortxt="";
				$this->status=false;
				return true;
			}
		}else{
			$this->fname="";
			$this->lname="";
			$this->email="";
			$this->errortxt="Database Connection: An Error Occured.";
			$this->status=false;
            return false;
        }
	}
	public function is_authenticated(){
		return $this->status;
	}
	public function getFirstName(){
        return htmlspecialchars($this->fname);
    }
    public function getLastName(){
        return htmlspecialchars($this->lname);
    }
    public function getEmail(){
        return htmlspecialchars($this->email);
    }
	public function getErrorTxt(){
        return htmlspecialchars($this->errortxt);
    }
}
?>