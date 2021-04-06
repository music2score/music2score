<?php 
use Codeception\Stub;

class BrowseSheetViewer_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = '';
        $I->assertEquals($expected,$BrowseSheetViewer->getErrorTxt());
        
        $expected = 'I Am An Error';
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$BrowseSheetViewer2->getErrorTxt());
    }
}