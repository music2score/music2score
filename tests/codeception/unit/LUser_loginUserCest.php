<?php 
use Codeception\Stub;

class LUser_loginUserCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing LUser->loginUser() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/login_class.php';
        
        $LUser = new LUser;
        $false=false;
        $expected="Database Connection: An Error Occured.";
        $status=$LUser->loginUser($false);
        $result=$LUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $false=false;
        $Connector=new Connectors;
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $LUser = Stub::make(LUser::class, ['email' => null]);
        $expected="Account Not Registered!";
        $status=$LUser->loginUser($db);
        $result=$LUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);
        

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $I->haveInDatabase('user', array('fname' => 'mudit', 'lname' => 'singh','email' => 'mudit@mudit.com','pass' => 'mudit123'));
        $LUser = Stub::make(LUser::class, ['email' => 'mudit@mudit.com', 'password' => 'mu123']);

        $expected="Invalid Credentials!";
        $status=$LUser->loginUser($db);
        $result=$LUser->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $LUser = Stub::make(LUser::class, ['email' => 'mudit@mudit.com', 'password' => 'mudit123']);
        $I->assertTrue($LUser->loginUser($db));
        $expected="";
        $expected_email="mudit@mudit.com";
        $result=$LUser->getErrorTxt();
        $I->assertEquals($expected,$result);
        $I->assertEquals($expected_email,$LUser->getemail());
    }
}
