<?php
// Connection & Authorization Process **STARTS**
session_start();
include("./helper/connect_class.php");
$Connector = new Connectors;
$db=$Connector->phptodbconnector();
$Auth = new Auth;
if(!$Auth->authenticate($_SESSION,$db)){
    unset($_SESSION);
}
if(!$Auth->is_authenticated()){
    header("Location: /login.php");
}
// Connection & Authorization Process **ENDS**

// Download Process **STARTS**
include("./helper/downloader_class.php");
$SheetDownloader = new SheetDownloader;
try{
    if(!isset($_GET["jobno"])||!is_numeric($_GET["jobno"])||$_GET["jobno"]<1){
        throw new Exception("Request Error: Job Number Not Available or Incorrect.");
    }
    if($SheetDownloader->generateUrl($db,$_SESSION["id"],$_GET["jobno"])){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($SheetDownloader->getUrl()).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Content-Length: ' . filesize($SheetDownloader->getUrl()));
        readfile($SheetDownloader->getUrl());
        exit;
    }else{
        throw new Exception($SheetDownloader->getErrorTxt());
    }
}catch(Exception $e){
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sheet Download Failed Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/sheetdownload.css">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="body_content_container">
        <div class="form_container">
            <div class="sheetdownload_container">
                <div class="row">
                    <div class="col-12">
                        <img src="./images/downloadsheet_image.jpg" style="width: 100%;" />
                    </div>
                </div>
                <div class="row">
                    <div class='connection_error col-12'>
                        <h4 class='connection_error_text'><?php echo $e->getmessage(); ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>

</html>
<?php } // Download Process **ENDS** ?>