<?php 
use Codeception\Stub;

class BrowseRecent_getNextExistsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getNextExists() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 0;
        $I->assertEquals($expected,$BrowseRecent->getNextExists());
        
        $expected = 1;
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['next' => 1]);
        $I->assertEquals($expected,$BrowseRecent2->getNextExists());
    }
}