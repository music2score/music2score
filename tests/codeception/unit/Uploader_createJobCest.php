<?php
use Codeception\Stub;
class Uploader_createJobCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader->createJobRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/uploader_class.php';
        
        $Uploader = new Uploader;
        $Connector = new Connectors;
        
        $I->assertFalse($Uploader->createJob(null,null,null));

        $I->assertFalse($Uploader->createJob(false,null,null));

        unset($_FILES);
        $_FILES["file"]["name"]="sample.doc";
        $_FILES["file"]["tmp_name"]="../codeception/bin/_data/sample.doc";
        $I->assertFalse($Uploader->createJob(true,null,$_FILES));

        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]=999;
        $_FILES["file"]["name"]="sample.doc";
        $_FILES["file"]["tmp_name"]="../codeception/bin/_data/sample.doc";
        $I->assertFalse($Uploader->createJob(false,$_SESSION,$_FILES));
        $I->assertFalse($Uploader->createJob(null,$_SESSION,$_FILES));

        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]=999;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $_FILES["file"]["name"]="sample.doc";
        $_FILES["file"]["tmp_name"]="../codeception/bin/_data/sample.doc";
        $I->assertFalse($Uploader->createJob($db,$_SESSION,$_FILES));

        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]=999;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $_FILES["file"]["name"]="sample.mid";
        $_FILES["file"]["tmp_name"]="../codeception/bin/_data/sample.mid";
        $I->assertFalse($Uploader->createJob($db,$_SESSION,$_FILES));

        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]=999;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $_FILES["file"]["name"]="sample.mid";
        $_FILES["file"]["tmp_name"]="/project/codeception/bin/_data/sample.mid";
        $Uploader=Stub::make(Uploader::class, ['movefile' => function($x,$y){ return true; }]);
        $I->assertTrue($Uploader->createJob($db,$_SESSION,$_FILES));
        
        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]="ABCD";
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $_FILES["file"]["name"]="sample.mid";
        $_FILES["file"]["tmp_name"]="/project/codeception/bin/_data/sample.mid";
        $Uploader=Stub::make(Uploader::class, ['movefile' => function($x,$y){ return true; }]);
        $I->assertFalse($Uploader->createJob($db,$_SESSION,$_FILES));
        /*
        unset($_SESSION);
        unset($_FILES);
        $_SESSION["id"]=999;
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb2']);
        $db=$Connector->phptodbconnector();
        $_FILES["file"]["name"]="sample.mid";
        $_FILES["file"]["tmp_name"]="/project/codeception/bin/_data/sample.mid";
        $Uploader=Stub::make(Uploader::class, ['createJob' => false]);
        $I->assertFalse($Uploader->createJob($db,$_SESSION,$_FILES));
       $I->assertFalse($Uploader->createJob($db,$_SESSION,$_FILES));
        
        */
    }
}
