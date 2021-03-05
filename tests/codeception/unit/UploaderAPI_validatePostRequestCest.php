<?php 
use Codeception\Stub;

class UploaderAPI_validatePostRequestCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing Uploader_API->validatePostRequest() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/api_class.php';
        
        $Uploader_API = new Uploader_API;
        
        unset($_POST);
        unset($_FILES);
        $_POST["fake"]="fake";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_png"]["name"]="right_format.png";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $_POST["fake"]="fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="wrong_id";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="wrong_key";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="0";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertTrue($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["fake"]["name"]="fake.fake";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="wrong_format.doc";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="wrong_format.doc";
        $I->assertFalse($Uploader_API->validatePostRequest($_POST,$_FILES));

        unset($_POST);
        unset($_FILES);
        $_POST["server_id"]="mid_1c23kk567303ui37";
        $_POST["server_key"]="bk345892ah20s78e867a6tjhwq9wejaicgs9eww83egegiis873jhs74wizjdu7r7hhxix7326639jhs0o0wheyt39wwbefiuioiyuiuehiruugfviud74hw843h900hnbhs923u4bsw902h224rfcw4234fcw34biureo8ryr8ufh849i8uywity143256euyr98wo4yurwehkdcviuyirie8ie7yrhger4uhei9i8ryfoiegriuryehirgf98e";
        $_POST["jobno"]="3";
        $_FILES["file_pdf"]["name"]="right_format.pdf";
        $_FILES["file_png"]["name"]="right_format.png";
        $I->assertTrue($Uploader_API->validatePostRequest($_POST,$_FILES));
    }
}
