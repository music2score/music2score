<?php 
use Codeception\Stub;

class Downloader_getLengthCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->getFirstName() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $expected = 0;
        $I->assertEquals($expected,$Downloader->getLength());

        $expected = 3;
        $Downloader2 = Stub::make(Downloader::class, ['length' => 3]);
        $I->assertEquals($expected,$Downloader2->getLength());
    }
}