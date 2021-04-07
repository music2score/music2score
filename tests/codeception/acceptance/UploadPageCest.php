<?php 
use Codeception\Stub;

class UploadPageCest
{
    // Upload page

    public function _before(AcceptanceTester $I)
    {
    }

    protected function _login (AcceptanceTester $I)
    {
        $I->amOnPage('/login.php');
        $I->fillField('email', 'testuser@test.com');        
        $I->fillField('password', '1234');
        $I->click('#loginbtn');
        $I->seeCurrentUrlEquals('/');
    }

    // Navigate to desired page and check elements are visible
    public function upload_navigation(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/upload.php');
        $I->see('File Uploader');
    }

    public function upload_attach_file(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/upload.php');
        $I->attachFile('#file', 'sample.mid');
        $I->click('.upload_submit_button');
        $I->wait(2);
        $I->seeCurrentUrlEquals('/download.php');
        $I->wait(10);
        $I->see('Status: Completed');
    }

    // public function upload_incorrect_file(AcceptanceTester $I) Looks like this has been changed. All files allowed now?
    // {
    //     $this->_login($I);
    //     $I->amOnPage('/upload.php');
    //     $I->attachFile('#file', 'dummy.txt');
    //     $I->click('#uploadbtn');
    //     $I->see('File Extension Not Supported!');
    //     $I->seeCurrentUrlEquals('/upload.php');
    // }

    

}