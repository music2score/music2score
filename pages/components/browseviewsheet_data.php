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
    // Connection & Authorization Process **ENDS**
    
    // API Process **STARTS**
    include("./../helper/browse_class.php");
    $BrowseSheetViewer = new BrowseSheetViewer;
    if(isset($_POST["musicid"])&&isset($_POST["page"])){
        if($BrowseSheetViewer->validatePageInfo($db,$_POST["musicid"],$_POST["page"])){
            if($BrowseSheetViewer->generatePageInfo()){
                $JSONobject->status="Success";
                $JSONobject->url=$BrowseSheetViewer->getImageUrl();
                $JSONobject->next=$BrowseSheetViewer->getNextExists();
                $JSONobject->previous=$BrowseSheetViewer->getPreviousExists();
                $JSONobject->page=$BrowseSheetViewer->getPageNo();
                $JSONobject->pages=$BrowseSheetViewer->getMaxPages();
            }else{
                $JSONobject->status="Error";
                $JSONobject->errortxt=$BrowseSheetViewer->getErrorTxt();
            }
        }else{
            $JSONobject->status="Error";
            $JSONobject->errortxt=$BrowseSheetViewer->getErrorTxt();
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