<?php
/*
Documentation

    Class:
    1. RUser - used to encapsulate registration process.

    Data Members:
    1. $fname - used for storing user's first name.
    2. $lname - used for storing user's last name.
    3. $email - used for storing user's email.
    4. $password - used for storing user's password.
    5. $cpassword - used for storing user's confirmation of password.
    6. $errortxt - used for storing error messages. 

    Member Functions:
    1. RUser->validateFormRequest() - Checks if form is submitted, stores submitted values in class variables. Requires form post object to 
    access form field data.
    2. RUser->validateFormFields() - Checks if submitted form fields are valid & updates the error string.
    3. RUser->registerUser($db) - Checks if the email is not already in use and a database connection is available, if yes then registers the user 
    otherwise updates the error string. 
    4. RUser->getErrorTxt() - Returns error string which will be empty when no error is present.
    5. RUser->getFirstName() - Returns the first name of user incase form field validation fails, otherwise returns an empty string.
    6. RUser->getLastName() - Returns the last name of user incase form field validation fails, otherwise returns an empty string.
    7. RUser->getEmail() - Returns the email of user incase form field validation fails, otherwise returns an empty string.

*/
Class RUser{
    private $fname="";
    private $lname="";
    private $email="";
    private $password="";
    private $cpassword="";
    private $errortxt="";

    public function validateFormRequest($post){
        if(isset($post["registerbtn"])&&isset($post["fname"])&&isset($post["lname"])&&isset($post["email"])&&isset($post["password"])&&isset($post["cpassword"])){
            $this->fname=$post["fname"];
            $this->lname=$post["lname"];
            $this->email=$post["email"];
            $this->password=$post["password"];
            $this->cpassword=$post["cpassword"];
            return true;
        }
        return false;
    }
    public function validateFormFields(){
        if($this->fname==""){
            $this->errortxt="Enter First Name";
            return false;
        }
        if($this->lname==""){
            $this->errortxt="Enter Last Name";
            return false;
        }
        if($this->email==""){
            $this->errortxt="Enter Email";
            return false;
        }
        if($this->password==""){
            $this->errortxt="Enter Password";
            return false;
        }
        if($this->cpassword==""){
            $this->errortxt="Confirm Password";
            return false;
        }
        if(!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+[.][a-z]{2,4}$/",$this->email)){
            $this->errortxt="Enter Correct Email";
            return false;
        }
        if($this->password!=$this->cpassword){
            $this->errortxt="Passwords do not match!";
            return false;
        }
        $this->errortxt="";
        return true;
    }
    public function registerUser($db){
        if($db!=false){
            $query=$db->prepare("SELECT * FROM user WHERE email=:email");
            $query->bindParam(":email",$this->email);
            $query->execute();
            $row=$query->rowCount();
            if($row>0){
                $this->errortxt="Email already in use!";
                return false;
            }
            $query=$db->prepare("INSERT INTO user (fname,lname,email,pass) VALUES (:fname,:lname,:email,:pass)");
            $query->bindParam(":fname",$this->fname);
            $query->bindParam(":lname",$this->lname);
            $query->bindParam(":email",$this->email);
            $query->bindParam(":pass",$this->password);
            $status=$query->execute();
            if(!$status){
                $this->errortxt="Database Connection: Query Failed.";
            }
            $db="";
            return $status;
        }else{
            $this->errortxt="Database Connection: An Error Occured.";
            return false;
        }

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