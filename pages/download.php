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
    header("Location: ./login.php");
}
// Connection & Authorization Process **ENDS**
?>
<!DOCTYPE html>
<html>

<head>
    <title>Download Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/download.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="body_content_container">
        <div class="form_container">
            <div class="download_container">
                <div class="container">
                    <div class="row">
                        <div class="image_container col-12 col-lg-6">
                            <img src="./images/download_image.jpg" style="width: 100%;">
                        </div>
                        <div class="heading_container col-12 col-lg-6">
                            <h2>File Downloader</h2>
                            <p>Easily download or view your converted sheet music.</p><br>
                            <h4>Last 10 Recent Conversions</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="content_container col-12 col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
<script src="js/download.js"></script>

</html>