<?php 
use Codeception\Stub;

class BrowseRecent_getInstrumentCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getInstrument() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = array();
        $I->assertEquals($expected,$BrowseRecent->getInstrument());
        
        $expected = array("Violin","Flute");
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['instrument' => array("Violin","Flute")]);
        $I->assertEquals($expected,$BrowseRecent2->getInstrument());
    }
}