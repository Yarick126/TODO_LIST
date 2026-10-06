
<?php
require_once 'app/utils.php';
class Auth_Controller extends Controller{
    function __construct(){
        $this->model = new Auth_Model();
        $this->view = new View();
    }

    public function default():void{
        $this->view->generatePage('login_template.php');        
    }


    public function login():void{
        if(isset($_POST['email']) && isset($_POST['password'])){
            try{
                $id = $this->model->getUser([
                    'email' => $_POST['email'], 
                    'password' =>$_POST['password']]);
                redirect("http://localhost:8080/todo-list/user");
            }
            catch(Exception $er) {
                $this->view->generatePage('login_template.php',[ 'errorMessage' => $er->getMessage()]);
            }
        }
    }
    public function register():void{

        if(!empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['name'])){
            try{
                $id = $this->model->addUser([ 
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                redirect("user?userId=" . $id);
            }
            catch(Exception $er){
                $this->view->generatePage('login_template.php',[ 'errorMessage' => $er->getMessage()]);
            }
        }
       
    }
}