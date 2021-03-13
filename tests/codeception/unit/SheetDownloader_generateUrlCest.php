<?php 
use Codeception\Stub;
    class SheetDownloader_generateUrlCest
    {
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
    $I->wantTo('Testing SheetDownloader->generateUrl() Function');
    include_once './pages/helper/connect_class.php';
    include_once './pages/helper/downloader_class.php';

    $SheetDownloader = new SheetDownloader;
    $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
    $db=$Connector->phptodbconnector();

    $_SESSION["fake"]="fake";
    unset($_SESSION);
    $I->assertFalse($SheetDownloader->generateUrl(null,null,null));
    $I->assertFalse($SheetDownloader->generateUrl(null,null,""));
    $I->assertFalse($SheetDownloader->generateUrl(null,null,-1));
    $I->assertFalse($SheetDownloader->generateUrl(null,null,1));

    unset($_SESSION);
    $I->assertFalse($SheetDownloader->generateUrl(null,"",1));

    unset($_SESSION);
    $_SESSION["id"]=1;
    $I->assertFalse($SheetDownloader->generateUrl(null,$_SESSION["id"],1));
    $I->assertFalse($SheetDownloader->generateUrl(false,$_SESSION["id"],1));

    unset($_SESSION);
    $_SESSION["id"]=1;
    $I->assertFalse($SheetDownloader->generateUrl($db,$_SESSION["id"],1));

    unset($_SESSION);
    $_SESSION["id"]=1;
    $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_other_file1.mid','userid' =>
    2,'processing' => 1,'completed' => 0));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
    $I->assertFalse($SheetDownloader->generateUrl($db,$_SESSION["id"],1));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);

    unset($_SESSION);
    $_SESSION["id"]=2;
    $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => './some_other_file2.mid','userid' =>
    2,'processing' => 1,'completed' => 0));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file2.mid','completed' => 0]);
    $I->assertFalse($SheetDownloader->generateUrl($db,$_SESSION["id"],2));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file2.mid','completed' => 0]);

    unset($_SESSION);
    $_SESSION["id"]=2;
    $I->haveInDatabase('jobs', array('jobid' => 3, 'filename' => './some_other_file3.mid','userid' =>
    2,'processing' => 1,'completed' => 1));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 1]);
    $I->assertFalse($SheetDownloader->generateUrl($db,$_SESSION["id"],3));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 1]);

    unset($_SESSION);
    $_SESSION["id"]=2;
    $I->haveInDatabase('jobs', array('jobid' => 4, 'filename' => './some_other_file4.mid','userid' =>
    2,'processing' => 1,'completed' => 1));
    $I->seeInDatabase('jobs', ['filename' => './some_other_file4.mid','completed' => 1]);
    $SheetDownloader2 = Stub::make(SheetDownloader::class, ['file_checker'=>function(){return true;}]);
    $I->assertTrue($SheetDownloader2->generateUrl($db,$_SESSION["id"],4)); 
    $I->seeInDatabase('jobs', ['filename' => './some_other_file4.mid','completed' => 1]);
    }
    }