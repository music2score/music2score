<?php 
use Codeception\Stub;

class SheetDownloader_getUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetDownloader->getUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetDownloader = new SheetDownloader;
        $expected = "";
        $I->assertEquals($expected,$SheetDownloader->getUrl());

        $expected = 'I am an Url!';
        $SheetDownloader2 = Stub::make(SheetDownloader::class, ['url'=>'I am an Url!']);
        $I->assertEquals($expected,$SheetDownloader2->getUrl());

    }
}