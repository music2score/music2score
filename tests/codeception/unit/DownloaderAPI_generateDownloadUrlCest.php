<?php 
use Codeception\Stub;
class DownloaderAPI_generateDownloadUrlCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader_API->generateDownloadUrl() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $Downloader_API = new Downloader_API;
        
        $I->assertFalse($Downloader_API->generateDownloadUrl(null));
        $I->assertFalse($Downloader_API->generateDownloadUrl(false));

        //JOB not set in class variable
        $I->assertFalse($Downloader_API->generateDownloadUrl($db));
        $Downloader_API2 = Stub::make(Downloader_API::class, ['jobno' => 0]);
        $I->assertFalse($Downloader_API->generateDownloadUrl($db));

        //Job Not Available in DB
        $Downloader_API2 = Stub::make(Downloader_API::class, ['jobno' => 67485986]);
        $I->assertFalse($Downloader_API2->generateDownloadUrl($db));

        //Job Available in Db but no file present
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './file_do_not_exist.txt','userid' => 1,'processing' => 1,'completed' => 0));
        $Downloader_API2 = Stub::make(Downloader_API::class, ['jobno' => 1]);
        $I->assertFalse($Downloader_API2->generateDownloadUrl($db));

        //Job Available in Db and file is present
        $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => 'dummy.txt','userid' => 1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename like' => 'dummy.txt']);
        $Downloader_API2 = Stub::make(Downloader_API::class, ['jobno' => 2,'file_checker' => function($address){ return true; }]);
        $I->assertTrue($Downloader_API2->generateDownloadUrl($db));
    }
}
