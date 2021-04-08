<?php
class ContactForm{
    private $errortxt="";
    private $email="";
    private $text="";
    private $status=0;
    public function validateFormRequest($post){
        if(isset($post["contactbtn"])&&isset($post["email"])&&isset($post["text"])){
            $this->email=$post["email"];
            $this->text=$post["text"];
            if($this->email==""){
                $this->errortxt="Enter Email";
                return false;
            }
            if($this->text==""){
                $this->errortxt="Enter text";
                return false;
            }
            if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+[.][a-z]{2,4}$/",$this->email)){
                $this->errortxt="Enter Correct Email";
                return false;
            }
            $this->errortxt="";
            return true;
        }
        return false;
    }
    public function contactSubmit($db){
        if($db!=false){
            $query=$db->prepare("INSERT INTO feedback (email,message) VALUES (:email,:text)");
            $query->bindParam(":email",$this->email);
            $query->bindParam(":text",$this->text);
            if($query->execute()){
                $this->status=1;
                $this->errortxt="";
                return true;
            }else{
                $this->errortxt="Database Connection: An Error Occured.";
                return false;
            }
        }else{
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        }
    }
    public function getEmail(){
        return htmlspecialchars($this->email);
    }
    public function getText(){
        return htmlspecialchars($this->text);
    }
    public function getErrorTxt(){
        return htmlspecialchars($this->errortxt);
    }
    public function isFormSubmitted(){
        return $this->status;
    }
}
?>