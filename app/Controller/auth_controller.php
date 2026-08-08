
<?php
require_once 'app/utils.php';
class Auth_Controller extends Controller{
        function __construct(){
        $this->model = new Auth_Model();
        $this->view = new View();
    }

    public function default(){
        if(isset($_GET['register'])){
            $this->view->generatePage('registration_template.php');
        }
        else {
            $this->view->generatePage('login_template.php');
        }
        
    }


    public function login(){

        if(isset($_POST['email']) && isset($_POST['password'])){
            try{
                $userData = $this->model->checkUser([
                    'email' => $_POST['email'], 
                    'password' =>$_POST['password']]);
                redirect("user?userId=" . $userData['userId']);
            }
            catch(Exception $er) {
                $this->view->generatePage('login_template.php',[ 'errorMessage' => $er->getMessage()]);
            }
        }
    }
    public function register(){

        if(isset($_POST['password']) && isset($_POST['email']) && isset($_POST['name'])){
            try{
                $this->view->generatePage('profile_template.php',$this->model->addUser([
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]));
            }
            catch(Exception $er){
                $this->view->generatePage('sign-up-template.php',[ 'errorMessage' => $er->getMessage()]);
            }
        }
       
    }
}