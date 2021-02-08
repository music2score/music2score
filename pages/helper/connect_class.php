<?php
/* 
Documentation

    Class:
    1. Connectors - used to encapsulate connection process.

    Member Functions:
    1. Connectors->phptodbconnector - connects mysql database with php pdo.
	
*/
Class Connectors{
	private $dbname="music2score_test";
	private $username="root";
	private $password="12345";
	
	function phptodbconnector(){
		try{
			//$db = new PDO('mysql:host='.$_SERVER['REMOTE_ADDR'].';dbname=music2score_test;charset=utf8','root','12345'); 
			$db = new PDO('mysql:host=mysql_server;dbname='.$this->dbname.';charset=utf8',$this->username,$this->password);
		}
		catch(Exception $e){
			return false;
		}
		return $db;
	}
}
?>