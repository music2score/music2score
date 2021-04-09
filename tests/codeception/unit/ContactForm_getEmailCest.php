<?php 
use Codeception\Stub;

class ContactForm_getEmailCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->getEmail() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        $expected = '';
        $I->assertEquals($expected,$ContactForm->getEmail());
        
        $expected = 'I Am An Email';
        $ContactForm2 = Stub::make(ContactForm::class, ['email' => 'I Am An Email']);
        $I->assertEquals($expected,$ContactForm2->getEmail());
    }
}