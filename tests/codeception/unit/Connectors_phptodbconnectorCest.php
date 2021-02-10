<?php 
use Codeception\Stub;

class Connectors_phptodbconnectorCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Connectors->phptodbconnectorCest() Function');
        include_once './pages/helper/connect_class.php';

        $Connector = new Connectors;
        $I->assertTrue(($Connector->phptodbconnector())!=false);
        
        $Connector = Stub::make(Connectors::class, ['password' => '123']);
        $I->assertFalse($Connector->phptodbconnector());
    }
}
