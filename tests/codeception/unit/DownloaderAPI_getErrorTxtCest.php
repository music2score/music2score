<?php 
use Codeception\Stub;

class DownloaderAPI_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader_API->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Downloader_API = new Downloader_API;
        $expected = '';
        $I->assertEquals($expected,$Downloader_API->getErrorTxt());
        
        $expected = 'I Am An Error';
        $Downloader_API2 = Stub::make(Downloader_API::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$Downloader_API2->getErrorTxt());
    }
}
