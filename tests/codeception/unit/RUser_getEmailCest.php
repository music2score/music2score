<?php 
use Codeception\Stub;

class RUser_getEmailCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->getEmail() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';
        
        $RUser = new RUser;
        $expected = '';
        $I->assertEquals($expected,$RUser->getEmail());
        
        $expected = 'mudit@mudit.com';
        $RUser2 = Stub::make(RUser::class, ['email' => 'mudit@mudit.com']);
        $I->assertEquals($expected,$RUser2->getEmail());
    }
}
