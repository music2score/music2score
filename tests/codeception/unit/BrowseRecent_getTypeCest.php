<?php 
use Codeception\Stub;

class BrowseRecent_getTypeCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getType() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = 'All';
        $I->assertEquals($expected,$BrowseRecent->getType());
        
        $expected = 'All';
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['type' => 'Wrong Type']);
        $I->assertEquals($expected,$BrowseRecent2->getType());

        $expected = 'Flute';
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['type' => 'Flute']);
        $I->assertEquals($expected,$BrowseRecent2->getType());
    }
}