<?php 
use Codeception\Stub;

class RUser_getLastNameCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->getLastName() Function');
        include_once './../pages/helper/connect_class.php';
        include_once './../pages/helper/register_class.php';
        
        $RUser = new RUser;
        $expected = '';
        $I->assertEquals($expected,$RUser->getLastName());
        
        $expected = 'Singh';
        $RUser2 = Stub::make(RUser::class, ['lname' => 'Singh']);
        $I->assertEquals($expected,$RUser2->getLastName());
        
    }
}
