<?php 
use Codeception\Stub;

class UploadDownloadViewCest
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

    // Info
    public function upload_and_view_file(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/upload.php');
        $I->attachFile('#file', 'sample.mid');
        $I->seeElement('#uploadbtn');
        $I->click('.upload_submit_button');

        $I->wait(2);
        
        $I->seeCurrentUrlEquals('/download.php');
        $I->see('Status: Queued');
        $I->dontSee('View', 'button');
        $I->dontSee('Download', 'button');
        
        $I->wait(10);
        
        $I->see('Status: Completed');
        $I->see('View', 'button');
        $I->see('Download', 'button');

        $I->click('View');
        $I->seeCurrentUrlEquals('/sheet_view.php?jobno=1&page=1');
    }  

    public function upload_and_download_file(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/upload.php');
        $I->attachFile('#file', 'sample.mid');
        $I->seeElement('#uploadbtn');
        $I->click('.upload_submit_button');

        $I->wait(2);
        
        $I->seeCurrentUrlEquals('/download.php');
        // $I->see('Status: Queued');
        
        $I->wait(10);
        
        $I->see('Status: Completed');
        $I->see('Download', 'button');

        $I->click('Download');
        $sampleName = $I->grabFromDatabase('jobs', 'filename', array('jobid' => 1));
        $fileName = explode(".", $sampleName);
        $downloadFile = $fileName[0].'.pdf';
        echo $downloadFile;
        // $I->seeFileFound($downloadFile, '/project/codeception/bin/_data');
        // Not sure where to look for the file
    }  

    public function upload_and_view_file_pages(AcceptanceTester $I)
    {
        $this->_login($I);
        $I->amOnPage('/upload.php');
        $I->attachFile('#file', '500miles.mid');
        $I->seeElement('#uploadbtn');
        $I->click('.upload_submit_button');

        $I->wait(3);
        
        $I->seeCurrentUrlEquals('/download.php');
        $I->see('Status: Queued');
        
        $I->wait(10);
        
        $I->see('Status: Completed');
        $I->see('View', 'button');

        $I->click('View');
        $I->seeCurrentUrlEquals('/sheet_view.php?jobno=1&page=1');

        $I->seeElement('.previous_gray_button');
        $I->seeElement('.next_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-right');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/sheet_view.php?jobno=1&page=2');

        $I->seeElement('.next_gray_button');
        $I->seeElement('.previous_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-left');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/sheet_view.php?jobno=1&page=1');

    }
}