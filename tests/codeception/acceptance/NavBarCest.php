<?php 
use Codeception\Stub;

class NavigationBarCest
{
    // Testing the buttons on the nav-bar, will only be tested
    // on one page as the nav-bar component is the same for all pages
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
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
        // Add test for clicking action 1
        $I->see('By Instrument');
        // Add test for clicking action 2
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

    // public function serach_bar(AcceptanceTester $I) 
    // {
    //     // Once this functionality is implemented there will be a need for
    //     // a test here
    // }

}