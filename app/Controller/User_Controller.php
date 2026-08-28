<?php 
require_once 'app/utils.php';
class User_Controller extends Controller {


    function __construct(){
        $this->model = new User_Model();
        $this->view = new View();
    }
    public function default(){
        if(isset($_GET['userId'])){
            try{
                $this->view->generatePage('profile_template.php', [ 'user' => $this->model->getUser($_GET['userId'])]);
            }
            catch(Exception $er){
                redirect('auth?login=yes');
            }
        }
    }

    public function logout(){
        if(isset($_GET['userId'])){
            try{
                $this->model->logout($_GET['userId']);
            }
            catch(Exception $er){
                echo $er->getMessage();
            }
            redirect('auth?login=yes');
        }

    }
    public function openFriends(){
        if(isset($_GET['userId'])){
            try{
                $this->view->generatePage('friends_list_template.php', ['user' => $this->model->getUser($_GET['userId']),'users' => $this->model->getAllUsers()]);
            }
            catch(Exception $er){
                redirect('auth?login=yes');
            }
        }
    }

    public function openSettings(){
        if(isset($_GET['userId'])){
            try{
                $this->view->generatePage('settings_template.php', ['user' => $this->model->getUser($_GET['userId'])]);
            }
            catch(Exception $er){
                redirect('auth?login=yes');
            }
        }
    }

    public function openAboutApp(){
        if(isset($_GET['userId'])){
            try{
                $this->view->generatePage('about_template.php', ['user' => $this->model->getUser($_GET['userId'])]);
            }
            catch(Exception $er){
                redirect('auth?login=yes');
            }
        }
    }

    public function addFriend(){
        
    }
}