<?php 
use Codeception\Stub;

class Downloader_generateRecentListingCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader->generateRecentListing() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $Downloader = new Downloader;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        
        $_SESSION["fake"]="fake";
        unset($_SESSION);
        $I->assertFalse($Downloader->generateRecentListing(null,null));
        
        unset($_SESSION);
        $_SESSION["id"]="";
        $I->assertFalse($Downloader->generateRecentListing(null,$_SESSION["id"]));

        unset($_SESSION);
        $_SESSION["id"]=3;
        $I->assertFalse($Downloader->generateRecentListing(null,$_SESSION["id"]));

        unset($_SESSION);
        $_SESSION["id"]=3;
        $I->assertFalse($Downloader->generateRecentListing(false,$_SESSION["id"]));

        unset($_SESSION);
        $_SESSION["id"]=3;
        $I->assertFalse($Downloader->generateRecentListing(true,$_SESSION["id"]));

        unset($_SESSION);
        $_SESSION["id"]=3;
        $I->assertFalse($Downloader->generateRecentListing($db,$_SESSION["id"]));

        unset($_SESSION);
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_other_file1.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => './some_other_file2.mid','userid' => 1,'processing' => 1,'completed' => 1));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
        $I->seeInDatabase('jobs', ['filename' => './some_other_file2.mid','completed' => 1]);
        $_SESSION["id"]=1;
        $I->assertTrue($Downloader->generateRecentListing($db,$_SESSION["id"]));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
        $I->seeInDatabase('jobs', ['filename' => './some_other_file2.mid','completed' => 1]);

    }
}