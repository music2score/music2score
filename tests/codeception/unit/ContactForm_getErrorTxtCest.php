<?php 
use Codeception\Stub;

class ContactForm_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        $expected = '';
        $I->assertEquals($expected,$ContactForm->getErrorTxt());
        
        $expected = 'I Am An Error';
        $ContactForm2 = Stub::make(ContactForm::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$ContactForm2->getErrorTxt());
    }
}