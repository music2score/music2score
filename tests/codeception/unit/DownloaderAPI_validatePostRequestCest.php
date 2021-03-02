<?php 
use Codeception\Stub;

class DownloaderAPI_validatePostRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Downloader_API->validatePostRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Downloader_API = new Downloader_API;
        
        unset($_POST);
        $_POST["fake"]="";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="wrong_key";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $I->assertFalse($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $I->assertTrue($Downloader_API->validatePostRequest($_POST));

        unset($_POST);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $I->assertTrue($Downloader_API->validatePostRequest($_POST));
    }
}
