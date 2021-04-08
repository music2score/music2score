<?php 
use Codeception\Stub;

class BrowsePageCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->amOnPage('/');
    }

    //tests    

    public function browse_recent_page(AcceptanceTester $I)
    {
        // Test fields valildation

        $I->click('Browse');

        $I->see('Most Recent');
        $I->click('Most Recent');

        $I->see('View');
        $I->see('Download');

        $I->wait(1);
        $I->click('View');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_view.php?musicid=100&page=1');

    }

    public function browse_recent_next_prev(AcceptanceTester $I)
    {
        // Test fields valildation

        $I->click('Browse');

        $I->see('Most Recent');
        $I->click('Most Recent');

        $I->seeElement('.previous_gray_button');
        $I->seeElement('.next_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-right');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_recent.php?page=2');

        $I->seeElement('.previous_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-left');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_recent.php?page=1');

    }

    public function browse_instrument(AcceptanceTester $I)
    {
        // Test fields valildation

        $I->click('Browse');

        $I->see('By Instrument');
        $I->click('By Instrument');

        $I->see('View');
        $I->see('Download');
        
        $I->wait(1);
        $I->click('View');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_view.php?musicid=100&page=1');

    }

    public function browse_instrument_next_prev(AcceptanceTester $I)
    {
        // Test fields valildation

        $I->click('Browse');

        $I->see('By Instrument');
        $I->click('By Instrument');

        $I->seeElement('.previous_gray_button');
        $I->seeElement('.next_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-right');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_instrument.php?type=All&page=2');

        $I->seeElement('.previous_button');
        $I->wait(1);
        $I->click('.fa-arrow-circle-left');
        $I->wait(1);
        $I->seeCurrentUrlEquals('/browse_instrument.php?type=All&page=1');

    }


    //Add download test when you figure out how
}
