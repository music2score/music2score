<?php 
use Codeception\Stub;

class SheetViewer_generatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing SheetViewer->generatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/downloader_class.php';
        
        $SheetViewer = new SheetViewer;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();

        //tests file_checker protected function.
        $I->assertFalse($SheetViewer->generatePageInfo());
        
        $SheetViewer2=Stub::make(SheetViewer::class,['file_checker'=>function($address){ return false; }]);
        $I->assertFalse($SheetViewer2->generatePageInfo());

        //Tests file_counter protected function.
        $SheetViewer2=Stub::make(SheetViewer::class,['folder'=>'/project/tests/codeception/unit/','filename'=>'filecounter_test','file_checker'=>function($address){ return true; }]);
        $I->assertFalse($SheetViewer2->generatePageInfo());
        
        $SheetViewer2=Stub::make(SheetViewer::class,['filename'=>"1",'pageno'=>3,'file_counter'=>function($address){ return 2; },'file_checker'=>function($address){ if($address!="1/1-page2.png"){ return true; }else{ return false; } }]);
        $I->assertFalse($SheetViewer2->generatePageInfo());

        $SheetViewer2=Stub::make(SheetViewer::class,['filename'=>"1",'pageno'=>3,'file_counter'=>function($address){ return 1; },'file_checker'=>function($address){ if($address!="1/1-page2.png"){ return true; }else{ return false; } }]);
        $I->assertTrue($SheetViewer2->generatePageInfo());

        $SheetViewer2=Stub::make(SheetViewer::class,['filename'=>"1",'pageno'=>2,'file_counter'=>function($address){ return 3; },'file_checker'=>function($address){ return true; }]);
        $I->assertTrue($SheetViewer2->generatePageInfo());
        /*
        $I->assertFalse($SheetViewer->generatePageInfo());
        $I->assertFalse($SheetViewer->generatePageInfo());

        unset($_SESSION);
        $_SESSION["fake"]="fake";
        $I->assertFalse($SheetViewer->generatePageInfo($db,null,null,null));
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,null,null));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,null,null));
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,"hgsjhg",null));
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,-1,null));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,1,null));
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,1,"sfsdfsdfd"));
        
        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,1,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_other_file1.mid','userid' =>
    2,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,1,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => '','userid' =>
    1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['jobid' => 2,'completed' => 0]);
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,2,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 3, 'filename' => './some_other_file3.mid','userid' =>
    1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 0]);
        $I->assertFalse($SheetViewer->generatePageInfo($db,$_SESSION,3,1));

        unset($_SESSION);
        $_SESSION["id"]=1;
        $I->haveInDatabase('jobs', array('jobid' => 4, 'filename' => './some_other_file4.mid','userid' =>
    1,'processing' => 1,'completed' => 1));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file4.mid','completed' => 1]);
        $I->assertTrue($SheetViewer->generatePageInfo($db,$_SESSION,4,-1));
        */
    }
}