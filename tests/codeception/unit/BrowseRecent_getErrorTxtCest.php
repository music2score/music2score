<?php 
use Codeception\Stub;

class BrowseRecent_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = '';
        $I->assertEquals($expected,$BrowseRecent->getErrorTxt());
        
        $expected = 'I Am An Error';
        $BrowseRecent2 = Stub::make(BrowseRecent::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$BrowseRecent2->getErrorTxt());
    }
}