<?php 
use Codeception\Stub;

class RUser_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';
        
        $RUser = new RUser;
        $expected = '';
        $I->assertEquals($expected,$RUser->getErrorTxt());
        
        $expected = 'I Am An Error';
        $RUser2 = Stub::make(RUser::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$RUser2->getErrorTxt());
    }
}
