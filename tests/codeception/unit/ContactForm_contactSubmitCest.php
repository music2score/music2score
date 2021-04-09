<?php 
use Codeception\Stub;

class ContactForm_contactSubmitCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->contactSubmit() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        $false=false;
        $expected="Database Connection: An Error Occured.";
        $status=$ContactForm->contactSubmit($false);
        $result=$ContactForm->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $ContactForm2 = Stub::make(ContactForm::class, ['email' => 'test@testing.com','text' => 'test message']);
        $expected="";
        $status=$ContactForm2->contactSubmit($db);
        $result=$ContactForm2->getErrorTxt();
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);
        $I->seeInDatabase('feedback', ['email' => 'test@testing.com','message' => 'test message']);

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $query=$db->prepare("DROP TABLE feedback");
        $query->execute();
        $ContactForm2 = Stub::make(ContactForm::class, ['email' => 'test@testing.com','text' => 'test message']);
        $expected="Database Connection: An Error Occured.";
        $status=$ContactForm2->contactSubmit($db);
        $result=$ContactForm2->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);
    }
}