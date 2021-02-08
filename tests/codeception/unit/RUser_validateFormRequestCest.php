<?php 

class RUser_validateFormRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->validateFormRequest() Function');
        include_once './../pages/helper/connect_class.php';
        include_once './../pages/helper/register_class.php';
        
        $RUser = new RUser;
        
        $I->assertFalse($RUser->validateFormRequest($_POST));

        $_POST["fname"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertFalse($RUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["fname"]="";
        $_POST["lname"]="";
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["cpassword"]="";
        $_POST["registerbtn"]="";
        $I->assertTrue($RUser->validateFormRequest($_POST));
    }
}
