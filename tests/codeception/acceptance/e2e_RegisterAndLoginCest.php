<?php 
use Codeception\Stub;

class RegistrationAndLoginCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->wait(1);
        $I->amOnPage('/register.php');
    }

    //tests    
    public function user_registration_and_login(AcceptanceTester $I)
    {
        // E2E test - User registers and then logs in with the new credentials

        $I->fillField('fname', 'Bob');
        $I->fillField('lname', 'Jones');
        $I->fillField('email', 'bobjones@gmail.com');
        $I->fillField('password', '12345');
        $I->fillField('cpassword', '12345');
        $I->click('#registerbtn');

        $I->amOnPage('/login.php');
        
        $I->fillField('email', 'bobjones@gmail.com');
        $I->fillField('password', '12345');
        $I->click('#loginbtn');

        $I->seeCurrentUrlEquals('/');

    }

    public function register_with_same_email_again(AcceptanceTester $I)
    {
        // E2E test - User attempts to re-register with the same email

        $I->fillField('fname', 'test');
        $I->fillField('lname', 'user');
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', '1234');
        $I->fillField('cpassword', '1234');
        $I->click('#registerbtn');

        $I->see('Email already in use!');

    }

    public function incorrect_email(AcceptanceTester $I)
    {
        // E2E test - User logs in with incorrect email address
               
        $I->amOnPage('/login.php');
        
        $I->fillField('email', 'TestUser@test.com');
        $I->fillField('password', '1234');
        $I->click('#loginbtn');
        $I->see('Enter Correct Email');

    }

    public function incorrect_password(AcceptanceTester $I)
    {
        // E2E test - User logs in with incorrect password
               
        $I->amOnPage('/login.php');

        $I->fillField('email', '');
        $I->fillField('email', 'testuser@test.com');
        $I->fillField('password', 'abcdef');
        $I->click('#loginbtn');
        $I->see('Invalid Credentials!');

    }
}
