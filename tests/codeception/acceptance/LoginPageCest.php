<?php 
use Codeception\Stub;

class LoginPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
    }

    //tests    

    public function login_page_fields_validation(AcceptanceTester $I)
    {
        // Test fields valildation

        $I->click('#loginbtn');
        $I->see('Enter Email');

        $I->fillField('email', 'test01@gmail.com');
        $I->click('#loginbtn');
        $I->see('Enter Password');
        
        $I->fillField('password', 'test');
        $I->click('#loginbtn');
        $I->see('Account Not Registered!');

    }
}
