<?php 
use Codeception\Stub;

class BrowseSheetViewer_getPageNoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getPageNo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$BrowseSheetViewer->getPageNo());
        
        $expected = 5;
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['pageno' => 5]);
        $I->assertEquals($expected,$BrowseSheetViewer2->getPageNo());
    }
}