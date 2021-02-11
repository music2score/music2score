<?php
/*
Documentation / Guidelines:

    Relevant to Back-End:
    1. $LUser - Object of RUser class.
    2. $LUser->validateFormRequest() - Checks if form is submitted, stores submitted values in class variables. Requires form post object to 
    access form field data.
    3. $LUser->validateFormFields() - Checks if submitted form fields are valid & updates the error string.
    4. $LUser->loginUser($db) - Checks if the user credentials are valid and a database connection is available, if yes then logs in the user 
    otherwise updates the error string. Requires pdo object as function parameter for connecting to database. 
    5. $Connector->phptodbconnector() - Returns the pdo object for connecting to database.
    6. $Auth->authenticate($_SESSION,$db) - Tries to authenticate user with the database, returns false only for database based failure otherwise
    returns true irrespective of authentication success or failure.
    7. $Auth->getErrorTxt() - Returns errortxt if authentication process encounters a database bound issue otherwise return empty string irrespective
    of authentication success or failure.

    Relevant to Front-End:
    1. $LUser->getErrorTxt() - Returns error string which will be empty when no error is present.
    2. $LUser->getEmail() - Returns the email of user incase form field validation fails, otherwise returns an empty string.
    3. $Auth->is_authenticated() - Returns the true if user is logged in, otherwise returns false.
    4. $Auth->getFirstName() - Returns the first name of the logged in user, if a user is not logged in returns empty string.
    5. $Auth->getLastName() - Returns the last name of the logged in user, if a user is not logged in returns empty string.
    6. $Auth->getEmail() - Returns the email address of the logged in user, if a user is not logged in returns empty string
    
    Notes:
    # Auth is used on this page to prevent a logged in user from trying to login again, if a logged-in user stumbles across this page he/she will be
    redirected to the homepage instead.
    # Password field should delibrately not retain their values
    # Refer to the samples provided below to incorporate the relevant functions.
    # Front-End Team - Please use the same naming convention used for form button/field names as provided in the sample below.
    # Front-End Team - DO NOT MAKE CHANGES TO ANY CODE OUTSIDE <html></html> TAGS.
    # Max Character Limits: fname(255), lname(255), email(400), password(255), cpassword(255). 

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
if($Auth->is_authenticated()){
    header("Location: ./");
}
// Connection & Authorization Process **ENDS**

// Login Process **STARTS**
include("./helper/login_class.php");
$LUser = new LUser;
if($LUser->validateFormRequest($_POST)){
    if($LUser->validateFormFields()){
        if($LUser->loginUser($db)){
            header("Location: ./");
        }
    }
}
// Login Process **ENDS**
?>

<!DOCTYPE html>
<html>

<body>

<h2>Login Form</h2>

<!-- Sample Error Text Implementation **Starts** -->
<p style="font-size: 18px; color: #880000;"><?php echo $LUser->getErrorTxt(); ?></p>
<!-- Sample Error Text Implementation **Ends** -->

<form action="./login.php" method="POST">

<!-- Sample Field Value Retention Implementation **Starts** -->
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" placeholder="Doe@Doe.com" value="<?php echo $LUser->getEmail(); ?>"><br>
<!-- Sample Field Value Retention Implementation **Ends** --> 

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" placeholder="*****"><br>

  <input id="loginbtn" name="loginbtn" type="submit" value="Submit">
  
</form> 

</body>
</html>