<?php 
use Codeception\Stub;

class FooterCest
{
    
    protected function _login (AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
        $I->fillField('email', 'testuser@test.com');        
        $I->fillField('password', '1234');
        $I->click('#loginbtn');
        $I->seeCurrentUrlEquals('/');
    }

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/');
    }

    //tests    

    public function footer_button_browse(AcceptanceTester $I)
    {
        // Test button valildation

        $I->see('Browse Existing Library');
        $I->click('.footer_button_browse');
        $I->seeCurrentUrlEquals('/browse_recent.php?page=1');
    }

    public function footer_button_upload(AcceptanceTester $I)
    {
        // Test button valildation
        
        $this->_login($I);
        $I->see('Upload Your Own File');
        $I->click('.footer_button_upload');
        $I->seeCurrentUrlEquals('/upload.php');
    }

    public function footer_button_email(AcceptanceTester $I)
    {
        // Test button valildation
        
        $I->see('info@music2score.com');
        $I->click('.footer_reach_email');
        $I->seeCurrentUrlEquals('/contactus.php');
    }
}
