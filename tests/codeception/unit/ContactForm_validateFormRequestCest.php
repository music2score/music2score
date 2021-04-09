<?php 
use Codeception\Stub;

class ContactForm_validateFormRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->validateFormRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        
        $_POST["xyz"]="abc";
        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit@mudit.com";
        $_POST["text"]="text";
        $I->assertTrue($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit@mudit.com";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit";
        $_POST["text"]="text";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit@mudit";
        $_POST["text"]="text";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit@mudit";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit.com";
        $_POST["text"]="text";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="mudit.com";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="";
        $_POST["text"]="text";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["contactbtn"]="Submit";
        $_POST["email"]="";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));

        unset($_POST);
        $_POST["email"]="";
        $_POST["text"]="";
        $I->assertFalse($ContactForm->validateFormRequest($_POST));
    }
}