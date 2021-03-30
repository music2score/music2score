<?php 
use Codeception\Stub;

class BrowseRecent_getIdCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getId() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = array();
        $I->assertEquals($expected,$BrowseRecent->getId());
        
        $expected = 1;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['id' => 1]);
        $I->assertEquals($expected,$BrowseRecent2->getId());
    }
}