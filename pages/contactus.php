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
<title>ContactUS Page - Music2Score</title>
<link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
<link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
<link rel="stylesheet" href="css/components.css">
<!-- <link rel="stylesheet" href="css/login.css"> -->
</head>
<body>
<?php include("./components/navbar.php"); ?>

<h2 style="margin: 300px auto; text-align: center;">Dummy Page</h2>
<?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>
</html>