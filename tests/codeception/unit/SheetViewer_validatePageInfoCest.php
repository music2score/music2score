<?php 
use Codeception\Stub;

class SheetViewer_validatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->validatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        
        $I->assertFalse($SheetViewer->validatePageInfo(null,null,null,null));
        $I->assertFalse($SheetViewer->validatePageInfo(false,null,null,null));

        unset($_SESSION);
        $_SESSION["fake"]="fake";
        $I->assertFalse($SheetViewer->validatePageInfo($db,null,null,null));
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,null,null));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,null,null));
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,"hgsjhg",null));
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,-1,null));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,1,null));
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,1,"sfsdfsdfd"));
        
        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,1,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_other_file1.mid','userid' =>
    2,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,1,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => '','userid' =>
    1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['jobid' => 2,'completed' => 0]);
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,2,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 3, 'filename' => './some_other_file3.mid','userid' =>
    1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 0]);
        $I->assertFalse($SheetViewer->validatePageInfo($db,$_SESSION,3,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 4, 'filename' => './some_other_file4.mid','userid' =>
    1,'processing' => 1,'completed' => 1));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file4.mid','completed' => 1]);
        $I->assertTrue($SheetViewer->validatePageInfo($db,$_SESSION,4,-1));

    }
}