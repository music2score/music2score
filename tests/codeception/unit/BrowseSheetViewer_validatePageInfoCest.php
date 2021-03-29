<?php 
use Codeception\Stub;

class BrowseSheetViewer_validatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->validatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertFalse($BrowseSheetViewer->validatePageInfo(null,null,null));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo(false,null,null));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,null,null));

        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,"Wrong Type",null));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,-1,null));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,1,null));
        
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,1,"Wrong Type"));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,1,1));

        $I->haveInDatabase('music', array('id' => 1, 'name' => 'some_file1', 'filename' => '','instrument' => 'Flute','date' => '2021-03-26 12:07:01'));
        $I->assertFalse($BrowseSheetViewer->validatePageInfo($db,1,1));

        $I->haveInDatabase('music', array('id' => 2, 'name' => 'some_file2', 'filename' => './some_file2.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:02'));
        $I->assertTrue($BrowseSheetViewer->validatePageInfo($db,2,-1));
    }
}