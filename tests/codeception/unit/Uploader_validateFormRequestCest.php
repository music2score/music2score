<?php 

class Uploader_validateFormRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader->validateFormRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/uploader_class.php';
        
        $Uploader = new Uploader;
        
        $I->assertFalse($Uploader->validateFormRequest(null,null));

        $_POST["hi"]="";
        $I->assertFalse($Uploader->validateFormRequest($_POST,null));

        unset($_POST);
        $I->assertFalse($Uploader->validateFormRequest(null,true));

        unset($_POST);
        $_POST["uploadbtn"]=true;
        $expected="Please select a file!";
        $I->assertFalse($Uploader->validateFormRequest($_POST,null));
        $I->assertEquals($expected,$Uploader->getErrorTxt());

        unset($_POST);
        $_POST["uploadbtn"]=true;
        $_FILES["file"]["name"]="test.pdf";
        $expected="File Extension Not Supported!";
        $I->assertFalse($Uploader->validateFormRequest($_POST,$_FILES));
        $I->assertEquals($expected,$Uploader->getErrorTxt());

        unset($_POST);
        $_POST["uploadbtn"]=true;
        $_FILES["file"]["name"]="test.mid";
        $expected="";
        $I->assertTrue($Uploader->validateFormRequest($_POST,$_FILES));
        $I->assertEquals($expected,$Uploader->getErrorTxt());
    }
}
