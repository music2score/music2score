<?php 
use Codeception\Stub;

class LUser_getEmailCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing LUser->getEmail() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/login_class.php';
        
        $LUser = new LUser;
        $expected = '';
        $I->assertEquals($expected,$LUser->getEmail());
        
        $expected = 'mudit@mudit.com';
        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit@mudit.com']);
        $I->assertEquals($expected,$LUser2->getEmail());
    }
}
