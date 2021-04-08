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
    // Connection & Authorization Process **STARTS**

    // Connection & Authorization Process **ENDS**
    // API Process **STARTS**
    include("./../helper/browse_class.php");
    $BrowseRecent = new BrowseRecent;
    
    if($_POST["type"]=="Search"){
        $check=$BrowseRecent->validateSearchPageInfo($db,$_POST["query"],$_POST["page"]);
    }else{
        $check=$BrowseRecent->validatePageInfo($db,$_POST["type"],$_POST["page"]);
    }
    if($check){
        if($BrowseRecent->generatePageInfo($db,$_POST["type"],$_POST["page"])){
            $JSONobject->status="Success";
            $JSONobject->length=$BrowseRecent->getLength();
            $JSONobject->id=$BrowseRecent->getId();
            $JSONobject->name=$BrowseRecent->getName();
            $JSONobject->instrument=$BrowseRecent->getInstrument();
            $JSONobject->date=$BrowseRecent->getDate();
            $JSONobject->next=$BrowseRecent->getNextExists();
            $JSONobject->previous=$BrowseRecent->getPreviousExists();
            $JSONobject->page=$BrowseRecent->getPageNo();
            $JSONobject->pages=$BrowseRecent->getMaxPages();
            $JSONobject->type=$BrowseRecent->getType();
            if($_POST["type"]=="Search"){
            $JSONobject->query=$BrowseRecent->getQuery();
            }
        }else{
            $JSONobject->status="Error";
            $JSONobject->errortxt=$BrowseRecent->getErrorTxt();
        }
    }else{
        $JSONobject->status="Error";
        $JSONobject->errortxt=$BrowseRecent->getErrorTxt();
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