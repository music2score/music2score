<?php
/*
Documentation

    Class:
    1. Downloader_API - used to encapsulate File Downloaded API process.

    Data Members:
    1. $errortxt - used for storing error messages. 
    2. $authorization_keys - used for storing id & password pairs to authenticate server requests.
    3. $jobno - used for storing the job number.
    4. $url - used for storing the file url.

    Member Functions:
    1. Downloader_API->validatePostRequest($post) - Checks if post request is formed and submitted correctly, validates it. Requires post object to 
    access post request data.
    2. Downloader_API->movefile($x,$y) - It is protected method to be used to move files from tmp directory[$x] to specified directory[$y].
    3. Downloader_API->generateDownloadUrl($db) - generates the url for downloading the file from the requested job entry in the jobs table otherwise 
    updates the error string. Requires pdo object as function parameter for connecting to database.
    4. Downloader_API->getErrorTxt() - Returns error string which will be empty when no error is present.
    5. Downloader_API->getUrl() - Returns url string which will be empty when there is an error present or if no url is generated.

*/
class Downloader_API{
    private $errortxt="";
    private $authorization_keys = array(
        "mid_1c23kk567303ui37" => "bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e",
    );
    private $jobno=0;
    private $url="";

    public function validatePostRequest($post){
        if(!isset($post["server_id"])||$post["server_id"]==""){
            $this->errortxt="Server ID is required";
            return false;
        }
        if(!isset($post["server_key"])||$post["server_key"]==""){
            $this->errortxt="Server Key is required";
            return false;
        }
        if(!array_key_exists($post["server_id"],$this->authorization_keys)){
            $this->errortxt="Invalid Credentials";
            return false;
        }
        if($this->authorization_keys[$post["server_id"]]!=$post["server_key"]){
            $this->errortxt="Invalid Credentials";
            return false;
        }
        if(!isset($post["jobno"])||$post["jobno"]==""){
            $this->jobno=0;
            $this->errortxt="Job Number is required";
            return false;
        }
        $this->errortxt="";
        $this->jobno=$post["jobno"];
        return true;
    }
    protected function file_checker($address){
        return file_exists("./../uploads/".$address);
    }
    public function generateDownloadUrl($db){
        if($db==false||$db==null){
            $this->errortxt="Database Connection Error: Connector Failed";
            return false;
        }
        if($this->jobno==0){
            $this->errortxt="No Job Specified";
            return false;
        }
        $query=$db->prepare("SELECT * FROM jobs WHERE jobid=:jobid");
        $query->bindParam(":jobid",$this->jobno);
        $check=$query->execute();
        $row=$query->rowCount();
        if($row!=1){
            $this->errortxt="Database Error: Job Doesn't Exists";
            return false;
        }
        $result=$query->fetch(PDO::FETCH_ASSOC);
        if(!$this->file_checker($result["filename"])){
            $this->errortxt="File Error: File Does Not Exist";
            return false;
        }
        $this->errortxt="";
        $this->url="./../uploads/".$result["filename"];
        return true;
    }
    public function getUrl(){
        return $this->url;
    }
    public function getErrortxt(){
        return $this->errortxt;
    }
}
?>