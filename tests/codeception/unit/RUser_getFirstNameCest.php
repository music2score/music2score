<?php 
use Codeception\Stub;

class RUser_getFirstNameCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->getFirstName() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';
        
        $RUser = new RUser;
        $expected = '';
        $I->assertEquals($expected,$RUser->getFirstName());

        $expected = 'Mudit';
        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit']);
        $I->assertEquals($expected,$RUser2->getFirstName());
    }
}
