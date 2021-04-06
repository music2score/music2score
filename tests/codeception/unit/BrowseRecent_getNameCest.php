<?php 
use Codeception\Stub;

class BrowseRecent_getNameCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getName() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = array();
        $I->assertEquals($expected,$BrowseRecent->getName());
        
        $expected = array("Tester1","Tester2");
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['name' => array("Tester1","Tester2")]);
        $I->assertEquals($expected,$BrowseRecent2->getName());
    }
}