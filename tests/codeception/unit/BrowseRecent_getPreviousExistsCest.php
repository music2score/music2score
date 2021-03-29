<?php 
use Codeception\Stub;

class BrowseRecent_getPreviousExistsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getPreviousExists() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 0;
        $I->assertEquals($expected,$BrowseRecent->getPreviousExists());
        
        $expected = 1;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['previous' => 1]);
        $I->assertEquals($expected,$BrowseRecent2->getPreviousExists());
    }
}