<?php
/*
Documentation

    Relevant to Back-End:
    1. Uploader_API - Object of Uploader_API class.
    2. Uploader_API->validatePostRequest($post,$file) - Checks if post request is formed and submitted correctly. it validates it while also checking
    file uploads. Requires post object to access post request data and file object to access the uploaded files.
    3. Uploader_API->closeJob($db,$file) - The function closes the job from the jobs table by simply setting the completed field to 1 when the files 
    are renamed and moved properly to the respective folder. it requires the both the database object and the file object.
    4. Uploader_API->getErrortxt() - Returns error string which will be empty when no error is present.
    5. $Connector - Object of Connectors class.
    6. $Connector->phptodbconnector() - Returns the pdo object for connecting to database.

    Form Request Example
    <form method="POST" action="./upload_api.php" enctype="multipart/form-data">
    <input type="text" name="server_id" value="mid_1c23kk567303ui37"/><br/>
    <input type="text" name="server_key" value="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e"/><br/>
    <input type="number" name="jobno" value="4"/><br/>
    <input type="file" name="file_pdf" /><br/>
    <input type="file" name="file_png" /><br/>
    <button type="submit" value="submit">Submit</button>
    </form>
*/
$JSONobject = new stdClass();
try{
    // Connection Process **STARTS**
    session_start();
    include("./../helper/connect_class.php");
    $Connector = new Connectors;
    $db=$Connector->phptodbconnector();
    if($db==false){
        throw new Exception("Database Connection Failed");
    }
    // Connection Process **ENDS**

    // API Process **STARTS**
    include("./../helper/api_class.php");
    $Uploader_API=new Uploader_API;
    if($Uploader_API->validatePostRequest($_POST,$_FILES)){
        if($Uploader_API->closeJob($db,$_FILES)){
            $JSONobject->status="Success";
            echo json_encode($JSONobject);
            exit(0);
        }else{
            throw new Exception($Uploader_API->getErrorTxt());
        }
    }else{
        throw new Exception($Uploader_API->getErrorTxt());
    }
    // API Process **ENDS**

}catch(Exception $e){
    $JSONobject->status="Failed";
    $JSONobject->errormsg=$e->getMessage();
    echo json_encode($JSONobject);
    exit(0);
}


?>