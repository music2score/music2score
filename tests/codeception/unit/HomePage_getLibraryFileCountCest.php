<?php 
use Codeception\Stub;

class HomePage_getLibraryFileCountCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing HomePage->getLibraryFileCount() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/home_class.php';
        
        $HomePage = new HomePage;
        $expected="Err";
        $I->assertEquals($expected,$HomePage->getLibraryFileCount(false));
        $I->assertEquals($expected,$HomePage->getLibraryFileCount(null));

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);

        $expected=0;
        $I->assertEquals($expected,$HomePage->getLibraryFileCount($db));
        
        $I->haveInDatabase('music', array('id' => 1, 'name' => 'some_file1', 'filename' => './some_file1.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:01'));
        $expected=1;
        $I->assertEquals($expected,$HomePage->getLibraryFileCount($db));
    }
}