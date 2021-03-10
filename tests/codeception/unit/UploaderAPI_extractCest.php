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

        //TEST CASE 1 **STARTS**

            //copy wrong zip and respective pdf file
            $test_folder="/project/tests/codeception/unit/extractzip_test/";
            $file = $test_folder.'wrong_zip.zip';
            $newfile = $test_folder.'wrong_zip2.zip';
            $I->assertTrue(copy($file, $newfile));
            $file2 = $test_folder.'wrong_zip.pdf';
            $newfile2 = $test_folder.'wrong_zip2.pdf';
            $I->assertTrue(copy($file2, $newfile2));

            //test if files are transferred correctly
            $I->assertTrue(file_exists($newfile));
            $I->assertTrue(file_exists($newfile2));
            
            //test extract function on it
            unset($_FILES);
            $_FILES["file_pdf"]["name"]="wrong_zip2.pdf";
            $_FILES["file_png"]["name"]="wrong_zip2.zip";
            $_FILES["file_pdf"]["tmp_name"]="wrong_zip2.pdf";
            $_FILES["file_png"]["tmp_name"]="wrong_zip2.zip";
            $I->haveInDatabase('jobs', array('jobid' => 2, 'filename' => 'wrong_zip2.mid','userid' => 1,'processing' => 1,'completed' => 0));
            $I->seeInDatabase('jobs', ['filename' => 'wrong_zip2.mid','completed' => 0]);
            $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 2,'folder' => '/project/tests/codeception/unit/extractzip_test/','movefile' => function($x,$y){ return true; }]);
            $I->assertFalse($Uploader_API->closeJob($db,$_FILES));
            $I->seeInDatabase('jobs', ['filename' => 'wrong_zip2.mid','completed' => 0]);
            //test if files are deleted or not
            $I->assertFalse(file_exists($newfile));
            $I->assertFalse(file_exists($newfile2));

        //TEST CASE 1 **ENDS**

        //TEST CASE 2 **STARTS**

            //copy wrong zip and respective pdf file
            $test_folder="/project/tests/codeception/unit/extractzip_test/";
            $file = $test_folder.'right_zip.zip';
            $newfile = $test_folder.'right_zip2.zip';
            $I->assertTrue(copy($file, $newfile));
            $file2 = $test_folder.'right_zip.pdf';
            $newfile2 = $test_folder.'right_zip2.pdf';
            $I->assertTrue(copy($file2, $newfile2));
            $extracted_files=$test_folder."sample2";

            //test if files are transferred correctly
            $I->assertTrue(file_exists($newfile));
            $I->assertTrue(file_exists($newfile2));
            
            //test extract function on it
            unset($_FILES);
            $_FILES["file_pdf"]["name"]="right_zip2.pdf";
            $_FILES["file_png"]["name"]="right_zip2.zip";
            $_FILES["file_pdf"]["tmp_name"]="right_zip2.pdf";
            $_FILES["file_png"]["tmp_name"]="right_zip2.zip";
            $I->haveInDatabase('jobs', array('jobid' => 3, 'filename' => 'right_zip2.mid','userid' => 1,'processing' => 1,'completed' => 0));
            $I->seeInDatabase('jobs', ['filename' => 'right_zip2.mid','completed' => 0]);
            $Uploader_API = Stub::make(Uploader_API::class, ['jobno' => 3,'folder' => '/project/tests/codeception/unit/extractzip_test/','movefile' => function($x,$y){ return true; }]);
            $I->assertTrue($Uploader_API->closeJob($db,$_FILES));
            $I->seeInDatabase('jobs', ['filename' => 'right_zip2.mid','completed' => 1]);
            
            //test if zip file is deleted, pdf and extracted files are intact.
            $I->assertFalse(file_exists($newfile));
            $I->assertTrue(file_exists($newfile2));
            $I->assertTrue(file_exists($extracted_files));

            //Delete the generated files for clean up
            unlink($newfile2);
            array_map('unlink', glob($extracted_files."/*.*"));
            rmdir($extracted_files);

            //test if cleanup completed successfully
            $I->assertFalse(file_exists($newfile));
            $I->assertFalse(file_exists($newfile2));
            $I->assertFalse(file_exists($extracted_files));

        //TEST CASE 2 **ENDS**
    }
}