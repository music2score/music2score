<?php 
use Codeception\Stub;

class BrowseRecent_validatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->validatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent = new BrowseRecent;
        $expected = '';
        $I->assertFalse($BrowseRecent->validatePageInfo(null,null,null));
        $I->assertFalse($BrowseRecent->validatePageInfo(false,null,null));

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $I->assertFalse($BrowseRecent->validatePageInfo($db,null,null));
        $I->assertFalse($BrowseRecent->validatePageInfo($db,false,null));
        $I->assertFalse($BrowseRecent->validatePageInfo($db,"Wrong",null));
        
        $I->assertFalse($BrowseRecent->validatePageInfo($db,"Flute",null));
        $I->assertTrue($BrowseRecent->validatePageInfo($db,"Flute",1));

    }
}