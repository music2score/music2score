<?php
/*
Documentation

    Class:
    1. Downloader_API - used to encapsulate File Download API process.
    2. Uploader_API - used to encapsulate File Upload API process.

    Data Members:

    -Downloader_API
    1. $errortxt - used for storing error messages. 
    2. $authorization_keys - used for storing id & password pairs to authenticate server requests.
    3. $jobno - used for storing the job number.
    4. $url - used for storing the file url.

    -Uploader_API
    1. $errortxt - used for storing error messages. 
    2. $authorization_keys - used for storing id & password pairs to authenticate server requests.
    3. $jobno - used for storing the job number.

    Member Functions:

    -Downloader_API
    1. Downloader_API->validatePostRequest($post) - Checks if post request is formed and submitted correctly, validates it. Requires post object to 
    access post request data.
    2. Downloader_API->movefile($x,$y) - It is protected method to be used to move files from tmp directory[$x] to specified directory[$y].
    3. Downloader_API->generateDownloadUrl($db) - generates the url for downloading the file from the requested job entry in the jobs table otherwise 
    updates the error string. Requires pdo object as function parameter for connecting to database.
    4. Downloader_API->getErrorTxt() - Returns error string which will be empty when no error is present.
    5. Downloader_API->getUrl() - Returns url string which will be empty when there is an error present or if no url is generated.
    6. file_checker($address) - Checks if the address or file exists in the upload folder or not.

    -Uploader_API
    1. Uploader_API->validatePostRequest($post,$file) - Checks if post request is formed and submitted correctly. it validates it while also checking
    file uploads. Requires post object to access post request data and file object to access the uploaded files.
    2. Uploader_API->movefile($x,$y) - It is protected method to be used to move files from tmp directory[$x] to specified directory[$y].
    3. Uploader_API->closeJob($db,$file) - The function closes the job from the jobs table by simply setting the completed field to 1 when the files 
    are renamed and moved properly to the respective folder. it requires the both the database object and the file object.
    4. Uploader_API->getErrortxt() - Returns error string which will be empty when no error is present.
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

class Uploader_API{
    private $errortxt="";
    private $authorization_keys = array(
        "mid_1c23kk567303ui37" => "bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e",
    );
    private $jobno=0;
    public function validatePostRequest($post,$file){
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
        if(!isset($file["file_pdf"]["name"])){
            $this->errortxt="File Error: PDF File Not Found!";
            return false;
        }
        $ext = pathinfo($file["file_pdf"]["name"],PATHINFO_EXTENSION);
        if($ext!=="pdf"){
            $this->errortxt="File Error: PDF File Format Not Supported!";
            return false;
        }
        if(!isset($file["file_png"])){
            $this->errortxt="File Error: PNG File Not Found!";
            return false;
        }
        $ext = pathinfo($file["file_png"]["name"],PATHINFO_EXTENSION);
        if($ext!=="png"){
            $this->errortxt="File Error: PNG File Format Not Supported!";
            return false;
        }
        $this->errortxt="";
        $this->jobno=$post["jobno"];
        return true;
    }
    public function movefile($x,$y){
        return move_uploaded_file($x,$y);
    }
    public function closeJob($db,$file){
        if($db!=false&&$db!=null){
            $folder="./../uploads/";
            $ext_pdf = pathinfo($file["file_pdf"]["name"],PATHINFO_EXTENSION);
            $ext_png = pathinfo($file["file_png"]["name"],PATHINFO_EXTENSION);
            try{
                $db->beginTransaction();
                $query=$db->prepare("SELECT * FROM jobs WHERE jobid=:jobid");
                $query->bindParam(":jobid",$this->jobno);
                $query->execute();
                $rows=$query->rowCount();
                if($rows!=1){
                    throw new Exception("Database Error: Unable to fetch Job Request");
                }
                $result=$query->fetch(PDO::FETCH_ASSOC);
                if($result["completed"]==1){
                    throw new Exception("Request Denied: Files Already Uploaded");
                }
                if($result["processing"]!=1){
                    throw new Exception("Request Denied: No Processing Server Authorised");
                }
                $name=substr($result["filename"], 0, -4);
                if ($this->movefile($file["file_pdf"]["tmp_name"], $folder.$name.".pdf")) {
                    if ($this->movefile($file["file_png"]["tmp_name"], $folder.$name.".png")) {
                        $query=$db->prepare("UPDATE jobs SET completed=1 WHERE jobid=:jobid");
                        $query->bindParam(":jobid",$this->jobno);
                        $result=$query->execute();
                        $db->commit();
                        $this->errortxt="";
                        return true;
                    }else{
                        throw new Exception("Database Transaction Failed: Please Try Again.");
                    }
                }else{
                    throw new Exception("Database Transaction Failed: Please Try Again.");
                }
            }catch(\Throwable $e){
                $db->rollback();
                $this->errortxt=$e->getMessage();
                return false;
            }
        }else{
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        }   
    }
    public function getErrortxt(){
        return $this->errortxt;
    }
}
?>