<?php
/*
Documentation

    Class:
    1. Downloader - used to encapsulate File Downloader process.
    2. SheetDownloader - used to encapsulate Sheet Downloader process.
    3. SheetViewer - used to encapsulate Sheet Viewer process.
    
    Data Members:

    - Downloader
        1. $errortxt - used for storing error messages.
        2. $length - used for storing length of array.
        3. $jobno - used for storing array of jobnos.
        4. $date - used for storing array of dates.
        5. $status - used for storing array of statuses of jobs.

    - SheetDownloader
        1. $errortxt - used for storing error messages.
        2. $url - used for storing url for download.

    - SheetViewer
        1. $errortxt - used for storing error string.
        2. $jobno - used for storing job number.
        3. $filename - used for storing name of file.
        4. $folder - used for storing folder path.
        5. $pageno - used for storing page number.
        6. $url - used for storing url.
        7. $maxfiles - used for storing number of files.
        8. $previous - used for storing 0 or 1 based on availablitiy of previous page.
        9. $next - used for storing 0 or 1 based on availablity of next page.

    Member Functions:
    
    - Downloader
        1. Downloader->generateRecentListing($db,$id) - generates a list of recent jobs, requires userid and database connection.
        2. Downloader->getErrorTxt() - Returns error string which will be empty when no error is present.
        3. Downloader->getLength() - Returns the length of the array which would be 0 when no element is present.
        4. Downloader->getJobNo() - Returns the array containing jobnos of recent jobs which is empty when no jobs are present.
        5. Downloader->getDate() - Returns the array containing dates of recent jobs which is empty when no jobs are present.
        5. Downloader->getStatus() - Returns the array containing statuses of recent jobs which is empty when no jobs are present.

    -SheetDownloader
        1. SheetDownloader->file_checker($address) - checks if a file or directory exists within uploads directory or not, requires
        directory or file name/path within the upload directory.
        2. SheetDownloader->generateUrl($db,$id,$jobno) - generates the url for downloading the sheet music file, requires connection 
        to the database, user id and jobno.
        3. SheetDownloader->getUrl() - return Downloadable Url which is empty when no Url is available.
        4. SheetDownloader->getErrorTxt() - return error string which is empty when no error is present.

    -SheetDownloader
        1. SheetDownloader->validatePageInfo($db,$session,$job,$page) - used to validate if all information is correct, requires database connection,
        user session, job number, page number.
        2. SheetDownloader->file_checker($address) - used for checking if an address is available within a folder or not, requires path of the folder.
        3. SheetDownloader->file_counter($address) - used for counting the number of files present within a given folder, requires path of the folder.
        4. SheetDownloader->generatePageInfo() - used to generate page information.
        5. SheetDownloader->getPageNo() - returns page number which is 0 when no page is present.
        6. SheetDownloader->getImageUrl() - returns image url which is empty when no url is present.
        7. SheetDownloader->getMaxPages() - return number of available pages which is 0 when no pages are present.
        8. SheetDownloader->getNextExists() - returns 1 when next page is available otherwise returns 0.
        9. SheetDownloader->getPreviousExists() - returns 1 when previous page is available otherwise returns 0.
        10. SheetDownloader->getErrorTxt() - returns error string which is empty when no error is present.
*/
class Downloader{
    private $errortxt="";
    private $length=0;
    private $jobno=array();
    private $date=array();
    private $status=array();
    public function generateRecentListing($db,$id){
        if(!isset($id)||$id==""||$id==null){
            $this->errortxt="Session Access Failed: Please Try Again.";
            return false;
        }
        if($db!=false&&$db!=null){
            try{
                $query=$db->prepare("SELECT * FROM jobs WHERE userid=:userid ORDER BY date DESC LIMIT 10");
                $query->bindParam(":userid",$id);
                $query->execute();
                $row=$query->rowCount();
                if($row==0){
                    $this->length=0;
                    $this->jobno=array();
                    $this->date=array();
                    $this->status=array();
                    $this->errortxt="You Haven't Converted Files Yet.";
                    return false;
                }else{
                    $this->length=$row;
                    for($i=0;$i<$this->length;$i++){
                        $result=$query->fetch(PDO::FETCH_ASSOC);
                        $this->jobno[$i]=$result["jobid"];
                        $this->date[$i]=date('jS M Y - g:i:s A',strtotime($result["date"]));
                        if($result["completed"]==1){
                            $this->status[$i]="Completed";
                        }else{
                            $this->status[$i]="Queued";
                        }
                    }
                    $this->errortxt="";
                    return true;
                }
            }catch(\Throwable $e){
                $this->errortxt=$e->getmessage();
                return false;
            }
        }else{
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        }
    }
    public function getErrorTxt(){
        return $this->errortxt;
    }
    public function getLength(){
        return $this->length;
    }
    public function getJobNo($i){
        if(!is_numeric($i)||$i>$this->length||$i<0){
            return "N/A";
        }
        return $this->jobno[$i];
    }
    public function getDate($i){
        if(!is_numeric($i)||$i>$this->length||$i<0){
            return "N/A";
        }
        return $this->date[$i];
    }
    public function getStatus($i){
        if(!is_numeric($i)||$i>$this->length||$i<0){
            return "N/A";
        }
        return $this->status[$i];
    }
}

class SheetDownloader{
    private $errortxt="";
    private $url="";
    protected function file_checker($address){
        return file_exists("./uploads/".$address);
    }
    public function generateUrl($db,$id,$jobno){
        if(!isset($jobno)||$jobno==""||$jobno==null||$jobno<1){
            $this->url="";
            $this->errortxt="Request Error: Job Number Not Available.";
            return false;
        }
        if(!isset($id)||$id==""||$id==null){
            $this->url="";
            $this->errortxt="Session Access Failed: Please Try Again.";
            return false;
        }
        if($db!=false&&$db!=null){
            try{
                $query=$db->prepare("SELECT * FROM jobs WHERE jobid=:jobid");
                $query->bindParam(":jobid",$jobno);
                $query->execute();
                $row=$query->rowCount();
                if($row==0){
                    throw new Exception("Database Error: Job Not Found!");
                }
                $result=$query->fetch(PDO::FETCH_ASSOC);
                if($id!=$result["userid"]){
                    throw new Exception("Authentication Error: Invalid Attempt.");
                }
                if($result["completed"]!=1){
                    $this->errortxt="Job Error: Job is not completed yet.";
                    return false;
                }
                $filename=substr($result["filename"],0,-4).".pdf";
                if(!$this->file_checker($filename)){
                    throw new Exception("File Error: File Does Not Exist.");
                }
                $this->errortxt="";
                $this->url="./uploads/".$filename;
                return true;
            }catch(\Throwable $e){
                $this->url="";
                $this->errortxt=$e->getmessage();
                return false;
            }
        }else{
            $this->url="";
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        } 
    }
    public function getUrl(){
        return $this->url;
    }
    public function getErrorTxt(){
        return $this->errortxt;
    }
}

class SheetViewer{
    private $errortxt="";
    private $jobno=0;
    private $filename="";
    private $folder="./../uploads/";
    private $pageno=0;

    private $url="";
    private $maxfiles=0;
    private $previous=0;
    private $next=0;
    
    public function validatePageInfo($db,$session,$job,$page){
        if(!isset($db)||$db==false||$db==null){
            $this->errortxt="Connection Error: Cannot Connect to database.";
            return false;
        }
        if(!isset($session["id"])){
            $this->errortxt="Authentication Error: Cannot Identify User.";
            return false;
        }
        if(!isset($job)||!is_numeric($job)||$job<1){
            $this->errortxt="Request Error: Invalid Job Number.";
            return false;
        }
        if(!isset($page)||!is_numeric($page)){
            $this->errortxt="Request Error: Invalid Page Number.";
            return false;
        }
        $query=$db->prepare("SELECT * FROM jobs WHERE jobid=:jobid");
        $query->bindParam(":jobid",$job);
        $query->execute();
        $row=$query->rowCount();
        if($row!=1){
            $this->errortxt="Database Error: Cannot find/resolve job.";
            return false;
        }
        $result=$query->fetch(PDO::FETCH_ASSOC);
        if($result["userid"]!=$session["id"]){
            $this->errortxt="Authentication Error: Job does not belong to signed-in user.";
            return false;
        }
        if($result["filename"]==""){
            $this->errortxt="Database Error: Cannot resolve filename.";
            return false;
        }
        if($result["completed"]!=1){
            $this->errortxt="Job Error: Job is not completed yet.";
            return false;
        }
        if($page<1){
            $page=1;
        }
        $this->jobno=$job;
        $this->pageno=$page;
        $this->filename=substr($result["filename"],0,-4);
        $this->errortxt="";
        return true;
    }
    protected function file_checker($address){
        return file_exists($this->folder.$address);
    }
    protected function file_counter($address){
        $directory_address=$this->folder.$address."/";
        $file_iterator = new FilesystemIterator($directory_address);
        return iterator_count($file_iterator);
    }
    public function generatePageInfo(){
        $directory_address=$this->filename;
        if(!$this->file_checker($directory_address)){
            $this->errortxt="File System Error: Directory Does Not Exist.";
            return false;
        }
        $file_count=$this->file_counter($directory_address);
        if($file_count<1){
            $this->errortxt="File System Error: Directory is Empty.";
            return false;
        }
        if($this->pageno>$file_count){
            $this->pageno=$file_count;
        }
        if($file_count==1){
            $url_append=$this->filename."/".$this->filename.".png";
        }else{
            $url_append=$this->filename."/".$this->filename."-page".$this->pageno.".png";
        }
        if(!$this->file_checker($url_append)){
            $this->errortxt="File System Error: Cannot Find Page.";
            return false;
        }
        $this->url=$this->folder.$url_append;
        $this->maxfiles=$file_count;
        if($this->pageno!=1){
            $this->previous=1;
        }else{
            $this->previous=0;
        }
        if($this->pageno!=$this->maxfiles){
            $this->next=1;
        }else{
            $this->next=0;
        }
        return true;
    }
    public function getPageNo(){
        return $this->pageno;
    }
    public function getImageUrl(){
        return $this->url;
    }
    public function getMaxPages(){
        return $this->maxfiles;
    }
    public function getNextExists(){
        return $this->next;
    }
    public function getPreviousExists(){
        return $this->previous;
    }
    public function getErrorTxt(){
        return $this->errortxt;
    }
}
?>