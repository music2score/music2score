<?php 
use Codeception\Stub;
class UploaderAPI_extractCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader_API->extract() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $Uploader_API = new Uploader_API;

        //both file transfers are successfull and extraction fails, testing extract function
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.zip";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.zip";
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_other_file1.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 1,'movefile' => function($x,$y){ return true; }]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file1.mid','completed' => 0]);

    }
}