<?php 
use Codeception\Stub;

class BrowseSheetViewer_generatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->generatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';

        $BrowseSheetViewer = Stub::make(BrowseSheetViewer::class, ['musicid' => 'Wrong ID']);
        $I->assertFalse($BrowseSheetViewer->generatePageInfo());

        mkdir ("/project/tests/codeception/unit/filecounter_test/sheet_images");
        $I->assertTrue(is_dir("/project/tests/codeception/unit/filecounter_test/sheet_images"));
        $BrowseSheetViewer = Stub::make(BrowseSheetViewer::class, ['file_checker' => function(){ return true; },'musicid' => '', 'folder' => '/project/tests/codeception/unit/filecounter_test']);
        $I->assertFalse($BrowseSheetViewer->generatePageInfo());
        rmdir ("/project/tests/codeception/unit/filecounter_test/sheet_images");
        $I->assertFalse(is_dir("/project/tests/codeception/unit/filecounter_test/sheet_images"));
        
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['file_checker' => function(){ return true; },'file_counter' => function(){ return 2; }]);
        $I->assertTrue($BrowseSheetViewer2->generatePageInfo());
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['file_checker' => function(){ return true; },'file_counter' => function(){ return 2; }, 'pageno' => 3]);
        $I->assertTrue($BrowseSheetViewer2->generatePageInfo());
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['file_checker' => function(){ return true; },'file_counter' => function(){ return 2; }, 'pageno' => 2]);
        $I->assertTrue($BrowseSheetViewer2->generatePageInfo());
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['file_checker' => function(){ return true; },'file_counter' => function(){ return 1; }, 'pageno' => 1]);
        $I->assertTrue($BrowseSheetViewer2->generatePageInfo());
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['file_checker' => function($address){ if($address=='0/sheet_images/sheet_music.png'){ return false; }else{ return true; } },'file_counter' => function(){ return 1; }, 'pageno' => 1]);
        $I->assertFalse($BrowseSheetViewer2->generatePageInfo());
    }
}