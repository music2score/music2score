<?php 
use Codeception\Stub;

class BrowseRecent_getQueryCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getQuery() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = '';
        $I->assertEquals($expected,$BrowseRecent->getQuery());
        
        $expected = 'I Am An String';
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['querystring' => 'I Am An String']);
        $I->assertEquals($expected,$BrowseRecent2->getQuery());
    }
}