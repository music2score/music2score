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

// File Upload Process **STARTS**

include("./helper/uploader_class.php");
$Uploader = new Uploader;
if($Uploader->validateFormRequest($_POST,$_FILES)){
    if($Uploader->createJob($db,$_SESSION,$_FILES)){
        header("Location: ./download.php");
    }
}

// File Upload Process **ENDS**
?>
<!DOCTYPE html>
<html>
<head>
<title>Upload Page - Music2Score</title>
<link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
<link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
<link rel="stylesheet" href="css/components.css">
<link rel="stylesheet" href="css/upload.css">
</head>
<body>
<?php include("./components/navbar.php"); ?>
<div class="body_content_container">
<form action="./upload.php" method="POST" enctype="multipart/form-data">
<div class="form_container">
<div class="upload_container">
<div class="design_container">
<img class="large_image" src="./images/upload_image.jpg" style="width: 100%; padding-right: 30px;">
</div>
<div class="main_container">
<h2>File Uploader</h2>
<p>Easily convert any music midi file into music sheet.</p><br>
<img class="small_image" src="images/upload_image2.jpg" style="width: 100%;"/>
<div class="field_container">
<hr>
<!-- Sample Error Text Implementation **Starts** -->
<p style="font-size: 18px; color: #880000;"><?php echo $Uploader->getErrorTxt(); ?></p>
<!-- Sample Error Text Implementation **Ends** -->

<!-- Sample Field Value Retention Implementation **Starts** -->
<div class="form-group">
  <label for="file" class="upload_label">Select Music File :</label><br>
  <input type="file" id="file" name="file" class="form-control" />
</div>
<!-- Sample Field Value Retention Implementation **Ends** --> 

<hr><br>
  <input id="uploadbtn" name="uploadbtn" type="submit" class="btn btn-default upload_submit_button" value="Upload">
  <div class="clear"></div>
</div>
</form> 
</div>
</div>
</div>
</div>
<?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
</html>