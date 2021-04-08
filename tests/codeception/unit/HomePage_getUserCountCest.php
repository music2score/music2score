<?php 
use Codeception\Stub;

class HomePage_getUserCountCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing HomePage->getUserCount() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/home_class.php';
        
        $HomePage = new HomePage;
        $expected="Err";
        $I->assertEquals($expected,$HomePage->getUserCount(false));
        $I->assertEquals($expected,$HomePage->getUserCount(null));

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);

        $expected=0;
        $I->assertEquals($expected,$HomePage->getUserCount($db));
        
        $I->haveInDatabase('user', array('fname' => 'mudit', 'lname' => 'singh','email' => 'mudit@mudit.com','pass' => 'mudit123'));
        $expected=1;
        $I->assertEquals($expected,$HomePage->getUserCount($db));
    }
}