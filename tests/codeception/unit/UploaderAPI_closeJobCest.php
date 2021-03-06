<?php 
use Codeception\Stub;
class UploaderAPI_closeJobCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader_API->closeJob() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $Uploader_API = new Uploader_API;

        //DB not available
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->closeJob(null,$_FILES));
        $I->assertFalse($Uploader_API->closeJob(false,$_FILES));

        //Job does not exist
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));

        //Already Completed
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_file.mid','userid' => 1,'processing' => 1,'completed' => 1));
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 1]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));
        
        //both file transfers fail
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => './some_other_file.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 2,'movefile' => function($x,$y){ return false; }]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));

        //first file transfers but second does not
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 3, 'filename' => './some_other_file2.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 3,'movefile' => function($x,$y){ if(substr($y,-4)==".pdf"){ return true; }else{ return false; }}]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));

        //both file transfers are successfull
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 4, 'filename' => './some_other_file3.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 0]);
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 4,'movefile' => function($x,$y){ return true; }]);
        $I->assertTrue($Uploader_API->closeJob($db,$_FILES));
        $I->seeInDatabase('jobs', ['filename' => './some_other_file3.mid','completed' => 1]);

        //both file transfers fail, testing movefile
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 5, 'filename' => './some_other_file4.mid','userid' => 1,'processing' => 1,'completed' => 0));
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 5]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));

        //No Processing Server Authorised, Request Denied
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_FILES["file_pdf"]["tmp_name"]="right_format.pdf";
        $_FILES["file_png"]["tmp_name"]="right_format.png";
        $I->haveInDatabase('jobs', array('jobid' => 6, 'filename' => './some_other_file5.mid','userid' => 1,'processing' => 0,'completed' => 0));
        $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 6]);
        $I->assertFalse($Uploader_API->closeJob($db,$_FILES));

    }
}
