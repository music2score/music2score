<?php 
use Codeception\Stub;

class BrowseSheetViewer_getNextExistsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getNextExists() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$BrowseSheetViewer->getNextExists());
        
        $expected = 1;
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['next' => 1]);
        $I->assertEquals($expected,$BrowseSheetViewer2->getNextExists());
    }
}