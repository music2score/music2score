<?php 
use Codeception\Stub;

class BrowseRecent_getMaxPagesCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getMaxPages() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 0;
        $I->assertEquals($expected,$BrowseRecent->getMaxPages());
        
        $expected = 9;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['maxpages' => 9]);
        $I->assertEquals($expected,$BrowseRecent2->getMaxPages());
    }
}