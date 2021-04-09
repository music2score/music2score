<?php 
use Codeception\Stub;

class HomePage_getFilesConvertedCountCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing HomePage->getFilesConvertedCount() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/home_class.php';
        
        $HomePage = new HomePage;
        $expected="Err";
        $I->assertEquals($expected,$HomePage->getFilesConvertedCount(false));
        $I->assertEquals($expected,$HomePage->getFilesConvertedCount(null));

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);

        $expected=0;
        $I->assertEquals($expected,$HomePage->getFilesConvertedCount($db));
        
        $I->haveInDatabase('jobs', array('jobid' => 1, 'filename' => './some_file.mid','userid' => 1,'processing' => 1,'completed' => 1));
        $expected=1;
        $I->assertEquals($expected,$HomePage->getFilesConvertedCount($db));
    }
}