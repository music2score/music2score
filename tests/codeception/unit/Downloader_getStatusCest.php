<?php 
use Codeception\Stub;

class Downloader_getStatusCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->getStatus() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $expected = "N/A";
        $I->assertEquals($expected,$Downloader->getStatus(1));

        $expected = 'Completed 5';
        $Downloader2 = Stub::make(Downloader::class, ['length'=>5,'status' => array('Completed 1','Completed 2','Completed 3','Completed 4','Completed 5')]);
        $I->assertEquals($expected,$Downloader2->getStatus(4));

    }
}