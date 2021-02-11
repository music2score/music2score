<?php 
use Codeception\Stub;

class Auth_getEmailCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->getEmail() Function');
        include_once './pages/helper/connect_class.php';
        
        $Auth = new Auth;
        $expected = '';
        $I->assertEquals($expected,$Auth->getEmail());
        
        $expected = 'mudit@mudit.com';
        $Auth2 = Stub::make(Auth::class, ['email' => 'mudit@mudit.com']);
        $I->assertEquals($expected,$Auth2->getEmail());
    }
}
