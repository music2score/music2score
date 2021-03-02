<?php 
use Codeception\Stub;

class DownloaderAPI_getUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader_API->getUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Downloader_API = new Downloader_API;
        $expected = '';
        $I->assertEquals($expected,$Downloader_API->getUrl());
        
        $expected = './hello.txt';
        $Downloader_API2 = Stub::make(Downloader_API::class, ['url' => './hello.txt']);
        $I->assertEquals($expected,$Downloader_API2->getUrl());
    }
}
