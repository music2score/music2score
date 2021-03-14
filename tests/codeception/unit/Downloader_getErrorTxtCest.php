<?php 
use Codeception\Stub;

class Downloader_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $expected = '';
        $I->assertEquals($expected,$Downloader->getErrorTxt());
        
        $expected = 'I Am An Error';
        $Downloader2 = Stub::make(Downloader::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$Downloader2->getErrorTxt());
    }
}