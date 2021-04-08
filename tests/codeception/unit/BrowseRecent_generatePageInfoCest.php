<?php 
use Codeception\Stub;

class BrowseRecent_generatePageInfoCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing BrowseRecent->generatePageInfo() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/browse_class.php';
        
        $BrowseRecent =Stub::make(BrowseRecent::class, ['limit' => 2]);
        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->haveInDatabase('music', array('id' => 1, 'name' => 'some_file1', 'filename' => './some_file1.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:01'));
        $I->haveInDatabase('music', array('id' => 2, 'name' => 'some_file2', 'filename' => './some_file2.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:02'));
        $I->haveInDatabase('music', array('id' => 3, 'name' => 'some_file3', 'filename' => './some_file3.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:03'));
        $I->haveInDatabase('music', array('id' => 4, 'name' => 'some_file4', 'filename' => './some_file4.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:04'));
        $I->haveInDatabase('music', array('id' => 5, 'name' => 'some_file5', 'filename' => './some_file5.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:05'));
        $I->assertFalse($BrowseRecent->generatePageInfo($db,"Violin",1));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Flute",1));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"All",1));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"All",999));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"All",-1));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"All",2));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['limit' => 5]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Flute",1));
        $I->haveInDatabase('music', array('id' => 6, 'name' => 'Mozart Sym 123', 'filename' => './some_file6.mid','instrument' => 'Violin','date' => '2021-03-26 12:07:06'));
        $I->haveInDatabase('music', array('id' => 7, 'name' => 'Mozart Sym 456', 'filename' => './some_file7.mid','instrument' => 'Flute','date' => '2021-03-26 12:07:07'));
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Violin",1));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['querystring' => "Mozart & Flute"]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Search",1));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['querystring' => "Mozart & Violin"]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Search",1));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['querystring' => "Mozart"]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Search",1));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['querystring' => "Flute"]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Search",1));
        $BrowseRecent =Stub::make(BrowseRecent::class, ['querystring' => "Violin"]);
        $I->assertTrue($BrowseRecent->generatePageInfo($db,"Search",1));
    }
}