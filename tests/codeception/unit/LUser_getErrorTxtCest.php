<?php 
use Codeception\Stub;

class LUser_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing LUser->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/login_class.php';
        
        $LUser = new LUser;
        $expected = '';
        $I->assertEquals($expected,$LUser->getErrorTxt());
        
        $expected = 'I Am An Error';
        $LUser2 = Stub::make(LUser::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$LUser2->getErrorTxt());
    }
}
