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
    <title>Browse Instruments Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/browse_instrument.css">
</head>

<body>
    <?php include("./components/navbar.php"); ?>

    <div class="body_content_container">
        <div class="form_container">
            <div class="browse_instrument_container">
                <div class="row row_container header">
                    <div class="d-none d-lg-block col-lg-5">
                        <img src="./images/browse_instrument_image_all.jpg" id="image1" style="width: 100%;">
                    </div>
                    <div class="d-block d-lg-none col-12">
                        <img src="./images/browse_instrument_image2_all.jpg" id="image2" style="width: 100%;">
                    </div>
                    <div class="col-12 col-lg-7"><br>
                        <h2>Browse Instruments</h2>
                        <p>Download Latest, Popular, & Trendy Sheet Music By Instrument.</p>
                        <select class="instrument_selector">
                            <option value="All">All</option>
                            <option value="Violin">Violin</option>
                            <option value="Flute">Flute</option>
                        </select>
                        <div class="col-12 paginator_container_top">
                            <a class="previous_button"><span class="fa fa-2x fa-arrow-circle-left"></span></a>
                            <input type="number" class="pageno_editable" value="2" />
                            <div class="divider">/</div>
                            <div class="pageno_readonly">32</div>
                            <a class="next_button"><span class="fa fa-2x fa-arrow-circle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="row row_container page_divider">
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row row_container">
                    <div class="col-12">
                        <div class="content_container col-12">

                        </div>
                    </div>
                    <div class="col-12 error_container">
                    </div>
                </div>
                <div class="row row_container page_divider">
                    <div class="col-12">
                        <img src="./images/browse_instrument_footer_image.jpg" style="width: 100%;">
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                </div>
                <div class="row row_container">
                    <div class="col-12">
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
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
<script src="js/browse_instrument.js"></script>

</html>