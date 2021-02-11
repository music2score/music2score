<?php 
use Codeception\Stub;

class Auth_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        
        $Auth = new Auth;
        $expected = '';
        $I->assertEquals($expected,$Auth->getErrorTxt());
        
        $expected = 'I Am An Error';
        $Auth2 = Stub::make(Auth::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$Auth2->getErrorTxt());
    }
}
