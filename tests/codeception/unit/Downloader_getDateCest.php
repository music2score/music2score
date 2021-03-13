<?php 
use Codeception\Stub;

class Downloader_getDateCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->getDate() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $expected = "N/A";
        $I->assertEquals($expected,$Downloader->getDate(1));

        $expected = '2021-05-05 16:23:59';
        $Downloader2 = Stub::make(Downloader::class, ['length'=>5,'date' => array('2021-01-05 16:23:59','2021-02-05 16:23:59','2021-03-05 16:23:59','2021-04-05 16:23:59','2021-05-05 16:23:59')]);
        $I->assertEquals($expected,$Downloader2->getDate(4));

    }
}