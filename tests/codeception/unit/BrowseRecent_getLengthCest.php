<?php 
use Codeception\Stub;

class BrowseRecent_getLengthCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getLength() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 0;
        $I->assertEquals($expected,$BrowseRecent->getLength());
        
        $expected = 10;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['length' => 10]);
        $I->assertEquals($expected,$BrowseRecent2->getLength());
    }
}