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

// Contact Process **STARTS**
include("./helper/contact_class.php");
$ContactForm = new ContactForm;
if($ContactForm->validateFormRequest($_POST)){
    $ContactForm->contactSubmit($db);
}
// Contact Process **ENDS**
?>
<!DOCTYPE html>
<html>

<head>
    <title>ContactUS Page - Music2Score</title>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico" />
    <link rel="stylesheet" href="plugins/bootstrap_v4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/fontawesome_v5.15.2/css/all.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/contactus.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php include("./components/navbar.php"); ?>
    <div class="body_content_container">
        <form action="./contactus.php" method="POST">
            <div class="form_container">
                <div class="contact_container">
                    <h2>Contact Us</h2><br>
                    <img src="images/contact_image.jpg" style="width: 100%;" />
                    <hr>
                    <?php if(!$ContactForm->isFormSubmitted()){ ?>
                    <!-- Sample Error Text Implementation **Starts** -->
                    <p style="font-size: 18px; color: #880000;"><?php echo $ContactForm->getErrorTxt(); ?></p>
                    <!-- Sample Error Text Implementation **Ends** -->
                    <!-- Sample Field Value Retention Implementation **Starts** -->
                    <div class="form-group">
                        <label for="email" class="contact_label">Email:</label><br>
                        <input type="text" id="email" name="email" placeholder="John@Doe.com" class="form-control"
                            value="<?php echo $ContactForm->getEmail(); ?>">
                    </div>
                    <!-- Sample Field Value Retention Implementation **Ends** -->
                    <div class="form-group">
                        <label for="text" class="contact_label">Message:</label><br>
                        <textarea rows="7" placeholder="Write Your Message (Max: 65535 Chars.)" maxlength="65535"
                            class="form-control" name="text" class=""><?php echo $ContactForm->getText(); ?></textarea>
                    </div>

                    <hr><br>
                    <input id="contactbtn" name="contactbtn" type="submit" class="btn btn-default contact_submit_button"
                        value="Submit">
                    <div class="clear"></div>
                    <?php }else{ ?>
                    <p class="contact_thank_you_text">Thank You!</p>
                    <hr>
                    <div class="contact_thank_you_return_container"><a href="./"
                            class="contact_thank_you_return">Return</a></div>
                    <?php }  ?>
        </form>
    </div>
    </div>
    </div>
    <?php include("./components/footer.php"); ?>
</body>
<script src="plugins/jquery_v3.5.1/js/jquery.min.js"></script>
<script src="plugins/bootstrap_v4.0/js/bootstrap.min.js"></script>

</html>