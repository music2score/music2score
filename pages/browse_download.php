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
// Connection & Authorization Process **ENDS**

// Download Process **STARTS**
include("./helper/browse_class.php");
$BrowseSheetDownloader = new BrowseSheetDownloader;

try{
    if(!isset($_GET["musicid"])||!is_numeric($_GET["musicid"])||$_GET["musicid"]<1){
        throw new Exception("Request Error: Invalid Music Reference.");
    }
    if($BrowseSheetDownloader->generateUrl($db,$_GET["musicid"])){
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($BrowseSheetDownloader->getUrl()).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Content-Length: ' . filesize($BrowseSheetDownloader->getUrl()));
        readfile($BrowseSheetDownloader->getUrl());
        exit;
    }else{
        throw new Exception($BrowseSheetDownloader->getErrorTxt());
    }
}catch(Exception $e){
?>

<!DOCTYPE html>
<html>

<head>
    <title>Browse Sheet Download Failed Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/browsedownload.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="body_content_container">
        <div class="form_container">
            <div class="browsedownload_container">
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