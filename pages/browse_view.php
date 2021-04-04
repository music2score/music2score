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
?>

<!DOCTYPE html>
<html>

<head>
    <title>Browse Sheet View Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/browseview.css">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="body_content_container">
        <div class="form_container">
            <div class="browseview_container">
                <div class="row">
                    <div class="col-12 paginator_container_top">
                        <a class="previous_button"><span class="fa fa-2x fa-arrow-circle-left"></span></a>
                        <input type="number" class="pageno_editable" value="2" />
                        <div class="divider">/</div>
                        <div class="pageno_readonly">32</div>
                        <a class="next_button"><span class="fa fa-2x fa-arrow-circle-right"></span></a>
                    </div>
                    <div class="col-12">
                        <img id="image" src="./images/viewsheet_loading.jpg" style="width: 100%;" />
                    </div>
                    <div class="col-12 error_container">
                    </div>
                    <div class="col-12 paginator_container_bottom">
                        <a class="previous_button"><span class="fa fa-2x fa-arrow-circle-left"></span></a>
                        <input type="number" class="pageno_editable" value="2" />
                        <div class="divider">/</div>
                        <div class="pageno_readonly">32</div>
                        <a class="next_button"><span class="fa fa-2x fa-arrow-circle-right"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
<script src="js/browse_viewsheet.js"></script>