<?php 
use Codeception\Stub;

class SheetViewer_getImageUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->getImageUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $expected = "";
        $I->assertEquals($expected,$SheetViewer->getImageUrl());

        $expected = "I am a URL!";
        $SheetViewer2 = Stub::make(SheetViewer::class, ['url'=>"I am a URL!"]);
        $I->assertEquals($expected,$SheetViewer2->getImageUrl());

    }
}