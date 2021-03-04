<?php 
use Codeception\Stub;

class UploaderAPI_getErrorTxtCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader_API->getErrorTxt() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Uploader_API = new Uploader_API;
        $expected = '';
        $I->assertEquals($expected,$Uploader_API->getErrorTxt());
        
        $expected = 'I Am An Error';
        $Uploader_API2 = Stub::make(Uploader_API::class, ['errortxt' => 'I Am An Error']);
        $I->assertEquals($expected,$Uploader_API2->getErrorTxt());
    }
}
