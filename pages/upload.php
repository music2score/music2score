<?php
/*
Documentation / Guidelines:

    Relevant to Back-End:
    1. $Uploader - Object of Uploader class.
    2. $Uploader->validateFormRequest($_POST,$_FILES) - Checks if form is submitted, validates it. Requires form post object to 
    access form field data.
    3. $Uploader->createJob($db,$_SESSION,$_FILES) - uploads the file and creates a job entry for it on the jobs table otherwise updates the error string.
    Requires pdo object as function parameter for connecting to database, session to link job back to user and also the respective file. 
    4. $Connector->phptodbconnector() - Returns the pdo object for connecting to database.
    5. $Auth->authenticate($_SESSION,$db) - Tries to authenticate user with the database, returns false only for database based failure otherwise
    returns true irrespective of authentication success or failure.
    6. $Auth->getErrorTxt() - Returns errortxt if authentication process encounters a database bound issue otherwise return empty string irrespective
    of authentication success or failure.

    Relevant to Front-End:
    1. $Uploader->getErrorTxt() - Returns error string which will be empty when no error is present.
    2. $Auth->is_authenticated() - Returns the true if user is logged in, otherwise returns false.
    3. $Auth->getFirstName() - Returns the first name of the logged in user, if a user is not logged in returns empty string.
    4. $Auth->getLastName() - Returns the last name of the logged in user, if a user is not logged in returns empty string.
    5. $Auth->getEmail() - Returns the email address of the logged in user, if a user is not logged in returns empty string
    
    Notes:
    # Auth is used on this page to only allow a logged-in user to visit this page, if a non logged-in user stumbles across this page he/she will be
    redirected to the login page instead.
    # Refer to the samples provided below to incorporate the relevant functions.
    # Front-End Team - Please use the same naming convention used for form button/field names as provided in the sample below.
    # Front-End Team - DO NOT MAKE CHANGES TO ANY CODE OUTSIDE <html></html> TAGS. 

*/

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
<form action="./upload.php" method="POST" enctype="multipart/form-data" id="sample-form">
<div class="form_container">
<div class="upload_container">
    <div class="design_container">
    <img class="large_image" src="./images/upload_image.jpg" style="width: 100%; padding-right: 30px;">
    </div>
<div class="main_container">
<h2>File Uploader</h2>
<p>Easily convert any music midi file into sheet music.</p><br>
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
<div class="form-group" id="process">
    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background-color: #f68e1e;">

        </div>
    </div>
</div>
<!-- Sample Field Value Retention Implementation **Ends** --> 

<hr><br>
  <input id="uploadbtn" name="uploadbtn" type="submit" class="btn btn-default upload_submit_button" value="Upload" id="upload">
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

<script>
    /*
    $(document).ready(function() {
        $('#sample-form').on('submit', function() {
            
            event.preventDefault();

            $.ajax({
                url: "./upload.php",
                method: "POST",
                data: $(this).serialize(),
                beforeSend: function() {
                    $('#upload').attr('disabled', 'disabled');
                    $('#process').css('display', 'block');
                },
                success: function(data) {
                    var percentage = 0;
                    var timer = setInterval(function() {
                        percentage = percentage + 20;
                        progress_bar_process(percentage, timer);
                    }, 1000);
                }
            });
        });

        function progress_bar_process(percentage, timer) {
            $('.progress-bar').css('width', percentage + '%');
            if (percentage > 100) {
                clearInterval(timer);
                $('#sample-form')[0].reset();
                $('#process').css('display', 'none');
                $('.progress-bar').css('width', '0%');
                $('#upload').attr('disabled', false);
            }
        }

    });*/
</script>