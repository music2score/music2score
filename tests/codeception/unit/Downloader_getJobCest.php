<?php 
use Codeception\Stub;

class Downloader_getJobNoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->getJobNo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $expected = "N/A";
        $I->assertEquals($expected,$Downloader->getJobNo(1));

        $expected = 5;
        $Downloader2 = Stub::make(Downloader::class, ['length'=>5,'jobno' => array(1,2,3,4,5)]);
        $I->assertEquals($expected,$Downloader2->getJobNo(4));

    }
}