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
    public function notFound(){
        $this->view->generatePage('not_found_template.php');
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
        if(isset($_GET['userId']) && isset($_COOKIE['token'])){
            $errorMsg = '';
            $user = [];
            $friends = [];
            $users = [];
            try{
                $user = $this->model->getUser();
                $friends = $this->model->getFriends($_GET['userId']);

            }
            catch(Exception $er){
                $errorMsg = $er->getMessage();
            }
            if(isset($_POST['friend_name'])){ // Проверка, если ищет пользователя
                try{
                    $users = $this->model->getAllUsers();
                }
                catch(Exception $er){
                    $errorMsg += ' ' . $er->getMessage();
                }
            }
            $this->view->generatePage('friends_list_template.php', 
                [
                    'user' =>  $user, 
                    'friends' => $friends , 
                    'error' => $errorMsg,
                    'users' => $users
                ]
            );
        }
        else {
            redirect('auth?login=yes');
        }
    }

    public function openSettings(){
        $userData = [];
        if(isset($_GET['userId']) && isset($_COOKIE['token'])){
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
        try{
            $this->model->addFriend($_GET['userId'],$_GET['friendId']);
            redirect("user?action=openFriends&userId=" . $_GET['userId']);
        }
        catch(Exception $er){
            echo($er->getMessage());
        }
    }

    public function openRequests(){
        try{
            $userData = [];
            if(isset($_GET['userId'])){
                $userData = $this->model->getUser();
                $users = $this->model->getRequests($_GET['userId']);
            }
            $this->view->generatePage('requests_template.php', ['user' => $userData, 'users' => $users]);
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }

    public function upload(){
        $this->model->addPicture();
        redirect('user?userId=' . $_GET['userId']);
    }

    public function acceptRequest(){
        try{
            if(isset($_GET['userId'])){
                $this->model->changeStatus('accepted');
            }
            redirect('users?action=openRequests&userId=' . $_GET['userId']);
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }
    public function rejectRequest(){
        try{
            if(isset($_GET['userId'])){
                $this->model->changeStatus('rejected');
            }
            redirect('users?action=openRequests&userId=' . $_GET['userId']);
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }

    public function unfriend(){
        try {
            $this->model->deleteFromFriends($_GET['friendId'], $_GET['userId']);
            redirect('users?action=openFriends&userId=' . $_GET['userId']);
        } catch (Exception $er) {
            $this->view->generatePage('friends_list_template.php', ['user'=> $this->model->getUser(), 'error' => $er->getMessage()]);
        }

    }

    public function deleteImage(){
        $this->model->deletePicture($_GET['userId']);
        redirect("user?userId=" . $_GET["userId"]);
    }
}