<?php
//Initialise JSON Object
$JSONobject = new stdClass();
header('Content-Type: application/json');
try{
    // Connection & Authorization Process **STARTS**
    session_start();
    include("./../helper/connect_class.php");
    $Connector = new Connectors;
    $db=$Connector->phptodbconnector();
    if($db==false){
        throw new Exception("Database Connection Failed");
    }
    $Auth = new Auth;
    if(!$Auth->authenticate($_SESSION,$db)){
        unset($_SESSION);
    }
    if(!$Auth->is_authenticated()){
        throw new Exception("User Not Authenticated");
    }
    // Connection & Authorization Process **ENDS**
    
    // API Process **STARTS**
    include("./../helper/downloader_class.php");
    $SheetViewer = new SheetViewer;
    if(isset($_POST["jobno"])&&isset($_POST["page"])){
        if($SheetViewer->validatePageInfo($db,$_SESSION,$_POST["jobno"],$_POST["page"])){
            if($SheetViewer->generatePageInfo()){
                $JSONobject->status="Success";
                $JSONobject->url=$SheetViewer->getImageUrl();
                $JSONobject->next=$SheetViewer->getNextExists();
                $JSONobject->previous=$SheetViewer->getPreviousExists();
                $JSONobject->page=$SheetViewer->getPageNo();
                $JSONobject->pages=$SheetViewer->getMaxPages();
            }else{
                $JSONobject->status="Error";
                $JSONobject->errortxt=$SheetViewer->getErrorTxt();
            }
        }else{
            $JSONobject->status="Error";
            $JSONobject->errortxt=$SheetViewer->getErrorTxt();
        }
    }else{
        $JSONobject->status="Error";
        $JSONobject->errortxt="Request Error: Invalid Request.";
    }
    echo json_encode($JSONobject);
    exit(0);
    //API Process **ENDS**

}catch(Exception $e){
    $JSONobject->status="Failed";
    $JSONobject->errormsg=$e->getMessage();
    echo json_encode($JSONobject);
    exit(0);
}
?>