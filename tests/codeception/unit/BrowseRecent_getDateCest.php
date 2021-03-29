<?php 
use Codeception\Stub;

class BrowseRecent_getDateCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getDate() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = array();
        $I->assertEquals($expected,$BrowseRecent->getDate());
        
        $expected = array("28th oct 2020","29th oct 2020");
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['date' => array("28th oct 2020","29th oct 2020")]);
        $I->assertEquals($expected,$BrowseRecent2->getDate());
    }
}