<?php 
use Codeception\Stub;

class Auth_authenticateCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Auth->authenticate() Function');
        include_once './pages/helper/connect_class.php';
        
        $false=false;
        $true=true;

        $Auth = new Auth;
        
        $expected="Database Connection: An Error Occured.";
        $status=$Auth->authenticate($false,$false);
        $result=$Auth->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $Auth = new Auth;
        $expected="Database Connection: An Error Occured.";
        $status=$Auth->authenticate($true,$false);
        $result=$Auth->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $Auth = new Auth;
        $_SESSION["fname"]="Mudit";
        $_SESSION["lname"]="Singh";
        $_SESSION["email"]="mudit@mudit.com";
        $expected="Database Connection: An Error Occured.";
        $status=$Auth->authenticate($_SESSION,$false);
        $result=$Auth->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $Auth = new Auth;
        $_SESSION["fname"]="";
        $_SESSION["lname"]="";
        $_SESSION["email"]="";
        $expected="Database Connection: An Error Occured.";
        $status=$Auth->authenticate($_SESSION,$false);
        $result=$Auth->getErrorTxt();
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        $Connector=new Connectors;
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        
        unset($_SESSION);
        $_SESSION["fname"]=null;
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]=null;
        $_SESSION["lname"]=null;
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]=null;
        $_SESSION["lname"]=null;
        $_SESSION["email"]=null;
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="";
        $_SESSION["lname"]=null;
        $_SESSION["email"]=null;
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="";
        $_SESSION["lname"]="";
        $_SESSION["email"]=null;
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="";
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="";
        $_SESSION["lname"]="";
        $expected="";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="";
        $_SESSION["lname"]="";
        $_SESSION["email"]="";
        $expected="Database Error: Cannot find user records.";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);

        unset($_SESSION);
        $_SESSION["fname"]="mudit";
        $_SESSION["lname"]="singh";
        $_SESSION["email"]="mudit@mudit.com";
        $expected="Database Error: Cannot find user records.";
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertFalse($login);
        $I->assertFalse($status);
        $I->assertEquals($expected,$result);
        

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);

        unset($_SESSION);
        $_SESSION["fname"]="mudit";
        $_SESSION["lname"]="singh";
        $_SESSION["email"]="mudit@mudit.com";
        $expected="";
        $I->haveInDatabase('user', array('fname' => 'mudit', 'lname' => 'singh','email' => 'mudit@mudit.com','pass' => 'mudit123'));
        $status=$Auth->authenticate($_SESSION,$db);
        $result=$Auth->getErrorTxt();
        $login=$Auth->is_authenticated();
        $I->assertTrue($login);
        $I->assertTrue($status);
        $I->assertEquals($expected,$result);
        $I->assertEquals("mudit",$Auth->getFirstName());
        $I->assertEquals("singh",$Auth->getLastName());
        $I->assertEquals("mudit@mudit.com",$Auth->getEmail());

    }
}
