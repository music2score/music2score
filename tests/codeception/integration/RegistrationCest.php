<?php 
use Codeception\Stub;

class RegistrationFileCest
{
    public function _before(UnitTester $I)
    {
    }

    //tests    

    public function upload_file(UnitTester $I)
    {
        
        include_once './pages/helper/connect_class.php';
        include_once './pages/helper/register_class.php';

        $I->wantTo('Test the register class');

        $Connector=Stub::make(Connectors::class, ['dbname' => 'testdb']);
        $db=$Connector->phptodbconnector();
        $I->assertTrue($db!=false);
        $RUser = Stub::make(RUser::class, ['fname' => 'Mudit','lname' => 'Singh','email' => 'mudit@mudit.com', 'password' => 'mu123','cpassword' => 'mu123']);

        if($RUser->validateFormRequest($_POST)){
            if($RUser->validateFormFields()){
                if($RUser->registerUser($db)){
                    echo "Shits working dawg";
                }
            }
        }
    }
}
