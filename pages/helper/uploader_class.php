<?php
class Uploader{
    private $errortxt="";
    public function validateFormRequest($post,$file){
        if(isset($post["uploadbtn"])&&isset($file["file"])){
            $ext = pathinfo($file["file"]["name"],PATHINFO_EXTENSION);
            switch($ext){
                case "mid":
                    $this->errortxt="";
                    return true;
                    break;
                default:
                    $this->errortxt="File Extension Not Supported!";
                    return false;
                    break;
            }
        }
        if(isset($post["uploadbtn"])&&!isset($file["file"])){
            $this->errortxt="Please select a file!";
            return false;
        }
        $this->errortxt="";
        return false;
    }
    protected function movefile($x,$y){
        return move_uploaded_file($x,$y);
    }
    public function createJob($db,$session,$file){
        if(!isset($session["id"])||$session["id"]==""||$session["id"]==null){
            $this->errortxt="Session Access Failed: Please Try Again.";
            return false;
        }
        if($db!=false&&$db!=null){
            $folder="./uploads/";
            $ext = pathinfo($file["file"]["name"],PATHINFO_EXTENSION);
            switch($ext){
                case "mid":
                    try{
                        $t = microtime(true);
                        $micro = sprintf("%06d",($t - floor($t)) * 1000000);
                        $d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
                        $filename = $session["id"]."_".$d->format("Ymd_Hisu")."_".rand(1000,9999).rand(1000,9999).rand(1000,9999).rand(1000,9999).".mid";
                        
                        $db->beginTransaction();
                        //Moves the files
                        if ($this->movefile($file["file"]["tmp_name"], $folder.$filename)) {
                            //Creates a Job
                            $query=$db->prepare("INSERT INTO jobs (userid,filename) VALUES (:userid,:filename)");
                            $query->bindParam(":userid",$session["id"]);
                            $query->bindParam(":filename",$filename);
                            $result=$query->execute();
                            //Validates if job is created succesfully
                            if($result==false){
                                throw new Exception("Transaction Failed!");
                            }
                            $db->commit();
                            $this->errortxt="";
                            return true;
                        }else{
                            $db->rollback();
                            $this->errortxt="Database Transaction Failed: Please Try Again.";
                            return false;
                        }
                    } catch (\Throwable $e) {
                        $db->rollback();
                        $this->errortxt="Database Transaction Failed: Please Try Again.";
                        return false;
                    }
                default: 
                    $this->errortxt="File Extension Not Supported!";
                    return false;
                    break;
            }
        }else{
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        }
    }
    public function getErrorTxt(){
        return htmlspecialchars($this->errortxt);
    }
}
?>