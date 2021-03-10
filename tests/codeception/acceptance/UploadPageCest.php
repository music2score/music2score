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
        $I->click('#uploadbtn');
        $I->wait(3);
        $I->seeElement('.progress-bar');
    }

}