<?php 
use Codeception\Stub;

class BrowseSheetViewer_getMaxPagesCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getMaxPages() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$BrowseSheetViewer->getMaxPages());
        
        $expected = 4;
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['maxfiles' => 4]);
        $I->assertEquals($expected,$BrowseSheetViewer2->getMaxPages());
    }
}