<?php 
use Codeception\Stub;

class PageLoadingCest
{
    // System testing for page loading
    // Criteria: Pages should load within 3 seconds of being accessed
    // Wait up to required time and check where elements in page are actionable

    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/'); //Change to home page when that is developed
    }

    // Navigate to desired page and check elements are visible
    public function registration_page(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
        $I->waitForElementVisible('.register_container', 3);
        $I->waitForElementClickable('#registerbtn', 0.01);
    }

    public function login_page(AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
        $I->waitForElementVisible('.login_container', 3);
        $I->waitForElementClickable('#loginbtn', 0.01);
    }
}