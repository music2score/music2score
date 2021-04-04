<?php 
use Codeception\Stub;

class BrowseSheetDownloader_getUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetDownloader->getUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetDownloader = new BrowseSheetDownloader;
        $expected = '';
        $I->assertEquals($expected,$BrowseSheetDownloader->getUrl());
        
        $expected = 'I Am An Url';
        $BrowseSheetDownloader2 = Stub::make(BrowseSheetDownloader::class, ['url' => 'I Am An Url']);
        $I->assertEquals($expected,$BrowseSheetDownloader2->getUrl());
    }
}