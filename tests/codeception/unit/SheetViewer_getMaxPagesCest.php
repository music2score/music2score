<?php 
use Codeception\Stub;

class SheetViewer_getMaxPagesCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->getMaxPages() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$SheetViewer->getMaxPages());

        $expected = 1;
        $SheetViewer2 = Stub::make(SheetViewer::class, ['maxfiles'=>1]);
        $I->assertEquals($expected,$SheetViewer2->getMaxPages());

    }
}