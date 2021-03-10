<?php 
use Codeception\Stub;

class UploadFileCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    //tests    

    public function upload_file(AcceptanceTester $I)
    {
        
        //include connector class to connect to DB
        //include register page or register_class to create a RUser
        //include auth to authenticate user
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/uploader_class.php';

        $I->wantTo('Upload a file');

        


    }
}
