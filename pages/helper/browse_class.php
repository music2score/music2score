<?php

class BrowseRecent {
    private $errortxt="";
    private $validtypes=array("All","Violin","Flute");
    private $type="All";
    
    private $pageno=0;
    private $maxpages=0;
    private $limit=10;

    private $id=array();
    private $name=array();
    private $instrument=array();
    private $date=array();
    private $length=0;

    private $previous=0;
    private $next=0;

    public function validatePageInfo($db,$type,$page){
        if(!isset($db)||$db==false||$db==null){
            $this->errortxt="Connection Error: Cannot Connect to database.";
            return false;
        }
        if(!isset($type)||$type==false||$type==null||!in_array($type, $this->validtypes)){
            $this->errortxt="Connection Error: Invalid Filter.";
            return false;
        }
        if(!isset($page)||!is_numeric($page)){
            $this->errortxt="Request Error: Invalid Page Number.";
            return false;
        }
        $this->errortxt="";
        return true;
    }
    public function generatePageInfo($db,$type,$page){
        //Fetch Total Number of Records
        if($type=="All"){
            $query=$db->prepare("SELECT * FROM music");
            $query->execute();
        }else{
            $query=$db->prepare("SELECT * FROM music WHERE instrument=:instrument");
            $query->bindParam(":instrument",$type);
            $query->execute();
        }
        $row=$query->rowCount();
        if($row==0){
            $this->length=0;
            $id=array();
            $name=array();
            $instrument=array();
            $date=array();
            $length=0;
            $this->errortxt="Database Error: No Records Found.";
            return false;
        }
        //Validate & Generate Page Number & Number of Pages
        if($row%$this->limit==0){
            $max=intdiv($row,$this->limit);
        }else{
            $max=intdiv($row,$this->limit)+1;
        }
        if($page>$max){
            $page=$max;
        }
        if($page<1){
            $page=1;
        }
        //Fetch Specific Data For Current Page 
        $offset=($page-1)*$this->limit;
        if($type=="All"){
            $query1=$db->prepare("SELECT * FROM music ORDER BY date DESC LIMIT :limit OFFSET :offset");
            $query1->bindParam(":limit",$this->limit,PDO::PARAM_INT);
            $query1->bindParam(":offset",$offset,PDO::PARAM_INT);
            $query1->execute();
        }else{
            $query1=$db->prepare("SELECT * FROM music WHERE instrument=:instrument ORDER BY date DESC LIMIT :limit OFFSET :offset");
            $query1->bindParam(":instrument",$type);
            $query1->bindParam(":limit",$this->limit,PDO::PARAM_INT);
            $query1->bindParam(":offset",$offset,PDO::PARAM_INT);
            $query1->execute();
        }
        while($result=$query1->fetch(PDO::FETCH_ASSOC)){
            $this->id[$this->length]=$result["id"];
            $this->name[$this->length]=$result["name"];
            $this->instrument[$this->length]=$result["instrument"];
            $this->date[$this->length]=$result["date"];
            $this->length=$this->length+1;
        }
        //Check if Next & Previous Pages are Available
        if($page<$max){
            $this->next=1;
        }else{
            $this->next=0;
        }
        if($page>1){
            $this->previous=1;
        }else{
            $this->previous=0;
        }
        $this->maxpages=$max;
        $this->pageno=$page;
        $this->errortxt="";
        $this->type=$type;
        return true;
    }
    public function getErrorTxt(){
        return $this->errortxt;
    }

    public function getPageNo(){
        return $this->pageno;
    }
    public function getMaxPages(){
        return $this->maxpages;
    }
    public function getNextExists(){
        return $this->next;
    }
    public function getPreviousExists(){
        return $this->previous;
    }
    public function getLength(){
        return $this->length;
    }
    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getInstrument(){
        return $this->instrument;
    }
    public function getDate(){
        return $this->date;
    }
    public function getType(){
        if(in_array($this->type, $this->validtypes)){
            return $this->type;
        }else{
            return "All";
        }
    }
}

class BrowseSheetViewer{
    private $errortxt="";
    private $musicid=0;
    private $filename="";
    private $folder="./../library/";
    private $pageno=0;

    private $url="";
    private $maxfiles=0;
    private $previous=0;
    private $next=0;
    
    public function validatePageInfo($db,$musicid,$page){
        if(!isset($db)||$db==false||$db==null){
            $this->errortxt="Connection Error: Cannot Connect to database.";
            return false;
        }
        if(!isset($musicid)||!is_numeric($musicid)||$musicid<1){
            $this->errortxt="Request Error: Invalid Music Reference.";
            return false;
        }
        if(!isset($page)||!is_numeric($page)){
            $this->errortxt="Request Error: Invalid Page Number.";
            return false;
        }
        $query=$db->prepare("SELECT * FROM music WHERE id=:id");
        $query->bindParam(":id",$musicid);
        $query->execute();
        $row=$query->rowCount();
        if($row!=1){
            $this->errortxt="Database Error: Cannot find/resolve music reference.";
            return false;
        }
        $result=$query->fetch(PDO::FETCH_ASSOC);
        if($result["filename"]==""){
            $this->errortxt="Database Error: Cannot resolve filename.";
            return false;
        }
        if($page<1){
            $page=1;
        }
        $this->musicid=$musicid;
        $this->pageno=$page;
        $this->filename=$result["filename"];
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
        $directory_address=$this->musicid."/sheet_images";
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
            $url_append=$this->musicid."/sheet_images/sheet_music.png";
        }else{
            $url_append=$this->musicid."/sheet_images/sheet_music-page".$this->pageno.".png";
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

class BrowseSheetDownloader{
    private $errortxt="";
    private $url="";
    protected function file_checker($address){
        return file_exists("./library/".$address);
    }
    public function generateUrl($db,$musicid){
        if(!isset($musicid)||$musicid==""||$musicid==null||$musicid<1){
            $this->url="";
            $this->errortxt="Request Error: Invalid Music Reference.";
            return false;
        }
        if($db!=false&&$db!=null){
            try{
                $query=$db->prepare("SELECT * FROM music WHERE id=:id");
                $query->bindParam(":id",$musicid);
                $query->execute();
                $row=$query->rowCount();
                if($row==0){
                    throw new Exception("Database Error: Music Reference Not Found!");
                }
               
                $filename=$musicid."/sheet_music.pdf";
                if(!$this->file_checker($filename)){
                    throw new Exception("File Error: File Does Not Exist.");
                }
                $this->errortxt="";
                $this->url="./library/".$filename;
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