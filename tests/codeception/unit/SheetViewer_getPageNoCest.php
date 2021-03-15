<?php 
use Codeception\Stub;

class SheetViewer_getPageNoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->getPageNo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$SheetViewer->getPageNo());

        $expected = 1;
        $SheetViewer2 = Stub::make(SheetViewer::class, ['pageno'=>1]);
        $I->assertEquals($expected,$SheetViewer2->getPageNo());

    }
}