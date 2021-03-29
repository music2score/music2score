<?php 
use Codeception\Stub;

class BrowseSheetViewer_getImageUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetViewer->getImageUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetViewer = new BrowseSheetViewer;
        $expected = '';
        $I->assertEquals($expected,$BrowseSheetViewer->getImageUrl());
        
        $expected = 'I Am An Url';
        $BrowseSheetViewer2 = Stub::make(BrowseSheetViewer::class, ['url' => 'I Am An Url']);
        $I->assertEquals($expected,$BrowseSheetViewer2->getImageUrl());
    }
}