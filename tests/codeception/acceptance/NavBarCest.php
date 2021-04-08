<?php 
use Codeception\Stub;

class NavigationBarCest
{
    // Testing the buttons on the nav-bar, will only be tested
    // on one page as the nav-bar component is the same for all pages
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->wait(2);
    }

    protected function _login (AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
        $I->fillField('email', 'testuser@test.com');        
        $I->fillField('password', '1234');
        $I->click('#loginbtn');
        $I->seeCurrentUrlEquals('/');
    }

    // tests
    public function click_home(AcceptanceTester $I)
    {
        $I->click('Home');
        $I->seeCurrentUrlEquals('/');
    }

    public function click_about(AcceptanceTester $I)
    {
        $I->click('About');
        $I->seeCurrentUrlEquals('/aboutus.php');
    }

    public function click_browse(AcceptanceTester $I)
    {
        $I->click('Browse');

        $I->see('Most Recent');
        $I->click('Most Recent');
        $I->seeCurrentUrlEquals('/browse_recent.php?page=1');

        $I->wait(2);
        $I->click('Browse');
        $I->see('By Instrument');
        $I->click('By Instrument');
        $I->seeCurrentUrlEquals('/browse_instrument.php?type=All&page=1');
    }

    public function click_contact(AcceptanceTester $I)
    {
        $I->click('Contact');
        $I->seeCurrentUrlEquals('/contactus.php');
    }

    public function click_signup_in(AcceptanceTester $I)
    {
        $I->click('Sign In/Up');
        $I->see('Register');
        $I->see('Login');

        $I->click('Login');
        $I->seeCurrentUrlEquals('/login.php');

        
        $I->amOnPage('/login.php');
        $I->click('Sign In/Up');
        $I->click('Register');
        $I->seeCurrentUrlEquals('/register.php');
    }

    // Logged in user does not see Sign Up/Sign In but Account button
    public function click_Account(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->see('Account');
        $I->click('Account');
        $I->see('Upload New');
        $I->see('My Sheets');
        $I->see('Logout');
        $I->makeScreenShot();

        $I->click('Upload New');
        $I->seeCurrentUrlEquals('/upload.php');

        $I->wait(1);
        $I->click('Account');
        $I->wait(0.5);
        $I->see('My Sheets');
        $I->wait(0.5);
        $I->click('My Sheets');
        $I->seeCurrentUrlEquals('/download.php');

        $I->wait(1);
        $I->click('Account');
        $I->wait(0.5);
        $I->see('Logout');
        $I->click('Logout');
        $I->seeCurrentUrlEquals('/');
        $I->see('Sign In/Up');
        $I->dontSee('Account');
    }

    // public function serach_bar(AcceptanceTester $I) 
    // {
    //     // Once this functionality is implemented there will be a need for
    //     // a test here
    // }

}