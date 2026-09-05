<?php 
require_once 'app/utils.php';
class User_Controller extends Controller {


    function __construct(){
        $this->model = new User_Model();
        $this->view = new View();
    }
    public function default(){
        $userData = [];
        if(isset($_GET['userId']) || isset($_COOKIE['token'])){
            try{
                $userData = $this->model->getUser();
            }
            catch(Exception $er){
                redirect('auth');
            }
        }
        else {
            $this->view->generatePage('welcome_template.php');
        }

        $this->view->generatePage('profile_template.php', ["user" => $userData]);

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
    public function openFriends($users=[]){
        if(isset($_GET['userId'])){
            try{
                $this->view->generatePage('friends_list_template.php', ['user' => $this->model->getUser(), 'users'=>$users]);
            }
            catch(Exception $er){
                redirect('auth?login=yes');
            }
        }
    }

    public function openSettings(){
        $userData = [];
        if(isset($_GET['userId'])){
           $userData = ['user' => $this->model->getUser()];
        }

        try{
            $this->view->generatePage('settings_template.php', $userData);
        }
        catch(Exception $er){
            redirect('auth?login=yes');
        }
    }

    public function openAboutApp(){
        $userData = [];
        if(isset($_GET['userId'])){
           $userData = ['user' => $this->model->getUser()];
        }
        try{
            $this->view->generatePage('about_template.php', $userData);
        }
        catch(Exception $er){
            redirect('auth?login=yes');
        }
    }

    public function addFriend(){
        if(isset($_GET['userId']) && isset($_GET['friendId'])){
            try{
                $this->model->addFriend($_GET['userId'],$_GET['friendId']);
            }
            catch(Exception $er){
                echo($er->getMessage());
            }
        }
    }

    public function findFriend(){
        $users= [];
        if(isset($_POST['friend_name']) && $_POST['friend_name'] != ''){
            try{
                $users = $this->model->getAllUsers();
            }
            catch(Exception $er){
                echo($er->getMessage());
            }
        }

        $this->openFriends($users);
    }
}