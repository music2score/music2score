<?php 
use Codeception\Stub;

class RUser_registerUserCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->registerUser() Function');
        include_once './../pages/helper/connect_class.php';
        include_once './../pages/helper/register_class.php';
        
        $RUser = new RUser;
        $false=false;
        $expected="Database Connection: An Error Occured.";
        $status=$RUser->registerUser($false);
        $result=$RUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $false=false;
        $Connector=new Connectors;
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $RUser = Stub::make(RUser::class, ['email' => null]);
        $expected="Database Connection: Query Failed.";
        $status=$RUser->registerUser($db);
        $result=$RUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);
        

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $RUser = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com', 'password' => 'mu123','cpassword' => 'mu123']);
        $I->assertTrue($RUser->registerUser($db));

        $expected="Email already in use!";
        $status=$RUser->registerUser($db);
        $result=$RUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);
    }
}
