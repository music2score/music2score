<?php 
use Codeception\Stub;

class BrowseSheetViewer_getPreviousExistsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getPreviousExists() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$BrowseSheetViewer->getPreviousExists());
        
        $expected = 1;
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['previous' => 1]);
        $I->assertEquals($expected,$BrowseSheetViewer2->getPreviousExists());
    }
}