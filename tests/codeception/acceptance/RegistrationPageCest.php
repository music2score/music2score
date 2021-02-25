<?php 
use Codeception\Stub;

class RegistrationPageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->amOnPage('/register.php');
    }

    //tests    
    public function registation_page_fields_validation(AcceptanceTester $I)
    {
        // 

        $I->click('#registerbtn');
        $I->see('Enter First Name');

        $I->fillField('fname', 'test');
        $I->click('#registerbtn');
        $I->see('Enter Last Name');

        $I->fillField('lname', 'testing');
        $I->click('#registerbtn');
        $I->see('Enter Email');

        $I->fillField('email', 'test@testing.com');
        $I->click('#registerbtn');
        $I->see('Enter Password');

        $I->fillField('password', '12345');
        $I->click('#registerbtn');
        $I->see('Confirm Password');

        $I->fillField('password', '12345');
        $I->fillField('cpassword', '12345');
        $I->click('#registerbtn');

        $I->seeCurrentUrlEquals('/login.php');
        
    }
}
