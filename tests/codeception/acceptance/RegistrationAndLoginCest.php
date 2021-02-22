<?php 
use Codeception\Stub;

class RegistrationAndLoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
    }

    //tests    
    public function user_registration_and_login(AcceptanceTester $I)
    {
        // E2E test - User registers and then logs in with the new credentials

        $I->click('#registerbtn');
        $I->see('Enter First Name');

        $I->fillField('fname', 'Ibrahim');
        $I->click('#registerbtn');
        $I->see('Enter Last Name');

        $I->fillField('lname', 'Ibrahim');
        $I->click('#registerbtn');
        $I->see('Enter Email');

        $I->fillField('email', 'ibrahim@ibrahim.com');
        $I->click('#registerbtn');
        $I->see('Enter Password');

        $I->fillField('password', 'Ibrahim');
        $I->click('#registerbtn');
        $I->see('Confirm Password');

        $I->fillField('password', 'Ibrahim');
        $I->fillField('cpassword', 'Ibrahim');
        $I->click('#registerbtn');
        
        $I->amOnPage('/login.php');
        
        $I->fillField('email', 'ibrahim@ibrahim.com');
        $I->fillField('password', 'Ibrahim');
        $I->click('#loginbtn');

        $I->seeCurrentUrlEquals('/');

    }

    public function incorrect_login(AcceptanceTester $I)
    {
        // E2E test - User logs in with incorrect new credentials
               
        $I->amOnPage('/login.php');
        
        $I->fillField('email', 'Ibrahim@ibrahim.com');
        $I->fillField('password', 'abcd');
        $I->click('#loginbtn');
        $I->see('Enter Correct Email');

        $I->fillField('email', '');
        $I->fillField('email', 'ibrahim@ibrahim.com');
        $I->fillField('password', 'abcd');
        $I->click('#loginbtn');
        $I->see('Invalid Credentials!');

    }

}
