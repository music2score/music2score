<?php 
use Codeception\Stub;

class ContactForm_isFormSubmittedCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->isFormSubmitted() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        $expected = 0;
        $I->assertEquals($expected,$ContactForm->isFormSubmitted());
        
        $expected = 1;
        $ContactForm2 = Stub::make(ContactForm::class, ['status' => 1]);
        $I->assertEquals($expected,$ContactForm2->isFormSubmitted());
    }
}