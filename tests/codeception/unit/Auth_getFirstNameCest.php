<?php 
use Codeception\Stub;

class Auth_getFirstNameCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->getFirstName() Function');
        include_once './pages/helper/connect_class.php';
        
        $Auth = new Auth;
        $expected = '';
        $I->assertEquals($expected,$Auth->getFirstName());

        $expected = 'Mudit';
        $Auth2 = Stub::make(Auth::class, ['fname' => 'Mudit']);
        $I->assertEquals($expected,$Auth2->getFirstName());
    }
}
