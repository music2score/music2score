<?php 
use Codeception\Stub;

class BrowseSheetDownloader_generateUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetDownloader->generateUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetDownloader = new BrowseSheetDownloader;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertFalse($BrowseSheetDownloader->generateUrl(null,null));
        $I->assertFalse($BrowseSheetDownloader->generateUrl(null,false));
        $I->assertFalse($BrowseSheetDownloader->generateUrl(null,-1));

        $I->assertFalse($BrowseSheetDownloader->generateUrl(null,1));
        $I->assertFalse($BrowseSheetDownloader->generateUrl(false,1));

        $I->assertFalse($BrowseSheetDownloader->generateUrl($db,1));
        $I->haveInDatabase('music', array('id' => 1, 'name' => 'some_file1', 'filename' => './some_file1.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:01'));
        $I->assertFalse($BrowseSheetDownloader->generateUrl($db,1));
        
        $BrowseSheetDownloader=Stub::make(BrowseSheetDownloader::class, ['file_checker' => function(){ return true; }]);
        $I->assertTrue($BrowseSheetDownloader->generateUrl($db,1));
    }
}