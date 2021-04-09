<?php 
use Codeception\Stub;

class BrowseRecent_validateSearchPageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->validateSearchPageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = '';
        $I->assertFalse($BrowseRecent->validateSearchPageInfo(null,null,null));
        $I->assertFalse($BrowseRecent->validateSearchPageInfo(false,null,null));

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $I->assertFalse($BrowseRecent->validateSearchPageInfo($db,null,null));
        $I->assertFalse($BrowseRecent->validateSearchPageInfo($db,false,null));
        $I->assertFalse($BrowseRecent->validateSearchPageInfo($db,"Wrong",null));
        
        $I->assertFalse($BrowseRecent->validateSearchPageInfo($db,"Flute",null));
        $I->assertTrue($BrowseRecent->validateSearchPageInfo($db,"Flute",1));

    }
}