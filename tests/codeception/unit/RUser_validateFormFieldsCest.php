<?php 
use Codeception\Stub;

class RUser_validateFormFieldsCest
{
    public function _before(UnitTester $I)
    {
    }

    // tests
    public function tryToTest(UnitTester $I)
    {
        $I->wantTo('Testing RUser->validateFormFields() Function');
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';
        
        $RUser = new RUser;

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertTrue($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => '','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => 'mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => '','email' => '','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit@mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => 'mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => 'Singh','email' => '','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit@mudit','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => 'mudit.com','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => 'mudit123','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => 'mudit123','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => 'mudit123','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => '','cpassword' => 'mudit123']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => '','cpassword' => 'mudit1']);
        $I->assertFalse($RUser2->validateFormFields());

        $RUser2 = Stub::make(RUser::class, ['fname' => '','lname' => '','email' => '','password' => '','cpassword' => '']);
        $I->assertFalse($RUser2->validateFormFields());
        /*$try=$this->getMockBuilder('RUser', ['fname' => true]);
        $result=$RUser->getFirstName();
        $expected='davert';
        $I->assertEquals($expected,$result);*/
    }
}
