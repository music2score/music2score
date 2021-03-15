<?php 
use Codeception\Stub;

class DownloadPageCest
{
    // Download page

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
    public function download_navigation(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/download.php');
        $I->see('File Downloader');
    }  

    public function empty_download_page(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/download.php');
        $I->see('File Downloader');
        $I->see('You Haven\'t Converted Files Yet.');
    }  
}