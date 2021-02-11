<?php 
use Codeception\Stub;

class Auth_getLastNameCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->getLastName() Function');
        include_once './pages/helper/connect_class.php';
        
        $Auth = new Auth;
        $expected = '';
        $I->assertEquals($expected,$Auth->getLastName());
        
        $expected = 'Singh';
        $Auth2 = Stub::make(Auth::class, ['lname' => 'Singh']);
        $I->assertEquals($expected,$Auth2->getLastName());
        
    }
}
