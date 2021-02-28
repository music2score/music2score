<?php 
use Codeception\Stub;

class Uploader_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/uploader_class.php';
        
        $Uploader = new Uploader;
        $expected = '';
        $I->assertEquals($expected,$Uploader->getErrorTxt());
        
        $expected = 'I Am An Error';
        $Uploader2 = Stub::make(Uploader::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$Uploader2->getErrorTxt());
    }
}
