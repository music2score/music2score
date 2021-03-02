<?php
/*
Documentation

    Relevant to Back-End:
    1. Downloader_API - Object of Downloader_API class.
    2. Downloader_API->validatePostRequest($post) - Checks if post request is formed and submitted correctly, validates it. Requires post object to 
    access post request data.
    3. Downloader_API->movefile($x,$y) - It is protected method to be used to move files from tmp directory[$x] to specified directory[$y].
    4. Downloader_API->generateDownloadUrl($db) - generates the url for downloading the file from the requested job entry in the jobs table otherwise 
    updates the error string. Requires pdo object as function parameter for connecting to database.
    5. Downloader_API->getErrorTxt() - Returns error string which will be empty when no error is present.
    6. Downloader_API->getUrl() - Returns url string which will be empty when there is an error present or if no url is generated.
    7. $Connector - Object of Connectors class.
    8. $Connector->phptodbconnector() - Returns the pdo object for connecting to database.

    Form Request Example
    $_POST["server_id"]="mid_1c23kk567303ui37";
    $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
    $_POST["jobno"]=3;
*/
// Initializing
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
    $Downloader_API=new Downloader_API;
    if($Downloader_API->validatePostRequest($_POST)){
        if($Downloader_API->generateDownloadUrl($db)){
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($Downloader_API->getUrl()).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Content-Length: ' . filesize($Downloader_API->getUrl()));
            readfile($Downloader_API->getUrl());
            exit;
        }else{
            throw new Exception($Downloader_API->getErrorTxt());
        }
    }else{
        throw new Exception($Downloader_API->getErrorTxt());
    }
    // API Process **ENDS**

}catch(Exception $e){
    $JSONobject->errormsg=$e->getMessage();
    echo json_encode($JSONobject);
    exit(0);
}
?>