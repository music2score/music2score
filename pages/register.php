<?php
/*
Documentation / Guidelines:

    Relevant to Back-End:
    1. $RUser - Object of RUser class.
    2. $RUser->validateFormRequest($_POST) - Checks if form is submitted, stores submitted values in class variables. Requires form post object to 
    access form field data.
    3. $RUser->validateFormFields() - Checks if submitted form fields are valid & updates the error string.
    4. $RUser->registerUser($db) - Checks if the email is not already in use and a database connection is available, if yes then registers the user 
    otherwise updates the error string. Requires pdo object as function parameter for connecting to database.
    5. $Connector->phptodbconnector() - Returns the pdo object for connecting to database.
    6. $Auth->authenticate($_SESSION,$db) - Tries to authenticate user with the database, returns false only for database based failure otherwise
    returns true irrespective of authentication success or failure.
    7. $Auth->getErrorTxt() - Returns errortxt if authentication process encounters a database bound issue otherwise return empty string irrespective
    of authentication success or failure.

    Relevant to Front-End:
    1. $RUser->getErrorTxt() - Returns error string which will be empty when no error is present.
    2. $RUser->getFirstName() - Returns the first name of user incase form field validation fails, otherwise returns an empty string.
    3. $RUser->getLastName() - Returns the last name of user incase form field validation fails, otherwise returns an empty string.
    4. $RUser->getEmail() - Returns the email of user incase form field validation fails, otherwise returns an empty string.
    5. $Auth->is_authenticated() - Returns the true if user is logged in, otherwise returns false.
    6. $Auth->getFirstName() - Returns the first name of the logged in user, if a user is not logged in returns empty string.
    7. $Auth->getLastName() - Returns the last name of the logged in user, if a user is not logged in returns empty string.
    8. $Auth->getEmail() - Returns the email address of the logged in user, if a user is not logged in returns empty string
    
    Notes:
    # Auth is used on this page to prevent a logged in user from trying to register, if a logged-in user stumbles across this page he/she will be
    redirected to the homepage instead.
    # Password and Confirm Password field should delibrately not retain their values
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

// Registration Process **STARTS**
    include("./helper/register_class.php");
    $RUser = new RUser;
    if($RUser->validateFormRequest($_POST)){
        if($RUser->validateFormFields()){
            if($RUser->registerUser($db)){
                header("Location: ./login");
            }
        }
    }
// Registration Process **ENDS**
?>

<!DOCTYPE html>
<html>

<body>

<h2>Registration Form</h2>

<!-- Sample Error Text Implementation **Starts** -->
<p style="font-size: 18px; color: #880000;"><?php echo $RUser->getErrorTxt(); ?></p>
<!-- Sample Error Text Implementation **Ends** -->

<form action="./register.php" method="POST">

<!-- Sample Field Value Retention Implementation **Starts** -->
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" placeholder="John" value="<?php echo $RUser->getFirstName(); ?>"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" placeholder="Doe"  value="<?php echo $RUser->getLastName(); ?>"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" placeholder="Doe@Doe.com" value="<?php echo $RUser->getEmail(); ?>"><br>
<!-- Sample Field Value Retention Implementation **Ends** --> 

  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" placeholder="*****"><br>
  <label for="cpassword">Confirm Password:</label><br>
  <input type="password" id="cpassword" name="cpassword" placeholder="*****"><br>
  <br>
  <input id="registerbtn" name="registerbtn" type="submit" value="Submit">
  
</form> 

</body>
</html>