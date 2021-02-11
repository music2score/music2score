<?php 
use Codeception\Stub;

class LUser_validateFormFieldsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing LUser->validateFormFields() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/login_class.php';
        
        $LUser = new LUser;

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit@mudit.com','password' => 'mudit123']);
        $I->assertTrue($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit@mudit.com','password' => '']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit','password' => 'mudit123']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit','password' => '']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit@mudit','password' => 'mudit123']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit@mudit','password' => '']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit.com','password' => 'mudit123']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => 'mudit.com','password' => '']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => '','password' => 'mudit123']);
        $I->assertFalse($LUser2->validateFormFields());

        $LUser2 = Stub::make(LUser::class, ['email' => '','password' => '']);
        $I->assertFalse($LUser2->validateFormFields());
    }
}
