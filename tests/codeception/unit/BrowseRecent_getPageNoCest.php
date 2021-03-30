<?php 
use Codeception\Stub;

class BrowseRecent_getPageNoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getPageNo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 0;
        $I->assertEquals($expected,$BrowseRecent->getPageNo());
        
        $expected = 5;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['pageno' => 5]);
        $I->assertEquals($expected,$BrowseRecent2->getPageNo());
    }
}