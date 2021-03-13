<?php
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