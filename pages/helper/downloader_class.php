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
                $check=$query->execute();
                if($check==false){
                    throw new Exception("Database Error: Query Failed!");
                }
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
                $check=$query->execute();
                if($check==false){
                    throw new Exception("Database Error: Query Failed!");
                }
                $row=$query->rowCount();
                if($row==0){
                    throw new Exception("Database Error: Job Not Found!");
                }
                $result=$query->fetch(PDO::FETCH_ASSOC);
                if($id!=$result["userid"]){
                    throw new Exception("Authentication Error: Invalid Attempt.");
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
?>