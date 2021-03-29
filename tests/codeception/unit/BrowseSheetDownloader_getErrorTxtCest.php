<?php 
use Codeception\Stub;

class BrowseSheetDownloader_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseSheetDownloader->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseSheetDownloader = new BrowseSheetDownloader;
        $expected = '';
        $I->assertEquals($expected,$BrowseSheetDownloader->getErrorTxt());
        
        $expected = 'I Am An Error';
        $BrowseSheetDownloader2 = Stub::make(BrowseSheetDownloader::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$BrowseSheetDownloader2->getErrorTxt());

    }
}