<?php 
use Codeception\Stub;

class ContactForm_getTextCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing ContactForm->getText() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/contact_class.php';
        
        $ContactForm = new ContactForm;
        $expected = '';
        $I->assertEquals($expected,$ContactForm->getText());
        
        $expected = 'I Am A Text';
        $ContactForm2 = Stub::make(ContactForm::class, ['text' => 'I Am A Text']);
        $I->assertEquals($expected,$ContactForm2->getText());
    }
}