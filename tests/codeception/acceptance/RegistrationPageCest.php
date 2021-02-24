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

        $I->seeCurrentUrlEquals('/login.php');
        
    }
}
