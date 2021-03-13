<?php 
use Codeception\Stub;

class SheetViewer_getNextExistsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->getNextExists() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $expected = 0;
        $I->assertEquals($expected,$SheetViewer->getNextExists());

        $expected = 1;
        $SheetViewer2 = Stub::make(SheetViewer::class, ['next'=>1]);
        $I->assertEquals($expected,$SheetViewer2->getNextExists());

    }
}