<?php 

class LUser_validateFormRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing LUser->validateFormRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/login_class.php';
        
        $LUser = new LUser;
        
        unset($_POST);
        $_POST["xyz"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["loginbtn"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["loginbtn"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["password"]="";
        $_POST["loginbtn"]="";
        $I->assertFalse($LUser->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["password"]="";
        $_POST["loginbtn"]="";
        $I->assertTrue($LUser->validateFormRequest($_POST));

    }
}
