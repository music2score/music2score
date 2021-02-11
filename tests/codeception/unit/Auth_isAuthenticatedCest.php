<?php 
use Codeception\Stub;

class Auth_isAuthenticatedCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->is_authenticated() Function');
        include_once './pages/helper/connect_class.php';
        
        $Auth = new Auth;
        $expected = false;
        $I->assertEquals($expected,$Auth->is_authenticated());

        $expected = true;
        $Auth2 = Stub::make(Auth::class, ['status' => true]);
        $I->assertEquals($expected,$Auth2->is_authenticated());

        $expected = false;
        $Auth2 = Stub::make(Auth::class, ['status' => false]);
        $I->assertEquals($expected,$Auth2->is_authenticated());
    }
}
