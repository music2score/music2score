<?php 
use Codeception\Stub;

class SheetDownloader_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetDownloader->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetDownloader = new SheetDownloader;
        $expected = "";
        $I->assertEquals($expected,$SheetDownloader->getErrorTxt());

        $expected = 'I am an Error!';
        $SheetDownloader2 = Stub::make(SheetDownloader::class, ['errortxt'=>'I am an Error!']);
        $I->assertEquals($expected,$SheetDownloader2->getErrorTxt());

    }
}