<?php 
use Codeception\Stub;

class SheetViewer_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $expected = "";
        $I->assertEquals($expected,$SheetViewer->getErrorTxt());

        $expected = 'I am an Error!';
        $SheetViewer2 = Stub::make(SheetViewer::class, ['errortxt'=>'I am an Error!']);
        $I->assertEquals($expected,$SheetViewer2->getErrorTxt());

    }
}