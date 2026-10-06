<?php 
require_once 'app/utils.php';
class User_Controller extends Controller {


    function __construct(){
        $this->model = new User_Model();
        $this->view = new View();
    }
    public function default():void{
        if(!empty($_SESSION)){
            try{
                $user = $this->model->getUser();
            }
            catch(Exception $er){
                redirect('auth');
            }
            $this->view->generatePage('profile_template.php', ["user" => $user]);
        }
        else {
            $this->view->generatePage('welcome_template.php');
        }

        

    }
    public function notFound():void{
        $this->view->generatePage('not_found_template.php');
    }
    public function logout(){
        try{
            $this->model->logout();
        }
        catch(Exception $er){
            echo $er->getMessage();
        }
        redirect('http://localhost:8080/todo-list/auth');

    }
    public function friends():void{
        if($_SESSION){
            $errorMsg = '';
            $friends = [];
            $users = [];
            try{
                $this->model->getUser();
                $friends = $this->model->getFriends($_SESSION['userId']);
                if(isset($_POST['friend_name'])){             // Проверка, если ищет пользователя
                    $users = $this->model->getAllUsers();
                }
            }
            catch(Exception $er){
                $errorMsg = $er->getMessage();
            }

            $this->view->generatePage('friends_list_template.php', 
                [
                    'friends' => $friends , 
                    'error' => $errorMsg,
                    'users' => $users
                ]
            );
        }
        else {
            redirect('http://localhost:8080/todo-list/auth');
        }
    }
    public function tasks():void{
        $this->view->generatePage('tasks_template.php');
    }
    public function settings():void{
        $this->view->generatePage('settings_template.php');

    }

    public function about_app():void{
        $this->view->generatePage('about_template.php');
    }

    public function addFriend():void{
        try{
            $this->model->addFriend($_GET['userId'],$_GET['friendId']);
            redirect("http://localhost:8080/todo-list/user/friends");
        }
        catch(Exception $er){
            echo($er->getMessage());
        }
    }

    public function requests():void{
        try{
            $users = $this->model->getRequests($_SESSION['userId']);
            $this->view->generatePage('requests_template.php', ['users' => $users]);
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }

    public function upload(){
        $this->model->addPicture();
        redirect('http://localhost:8080/todo-list/user');
    }

    public function acceptRequest(){
        try{
            $this->model->changeStatus('accepted');
            redirect('http://localhost:8080/todo-list/users/requests');
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }
    public function rejectRequest(){
        try{
            $this->model->changeStatus('rejected');
            redirect('http://localhost:8080/todo-list/users/requests');
        }
        catch(Exception $er){
            $this->view->generatePage('requests_template.php', ['error' => $er->getMessage()]);
        }
    }

    public function unfriend():void{
        try {
            $this->model->deleteFromFriends($_GET['friendId']);
            redirect('http://localhost:8080/todo-list/users/friends');
        } catch (Exception $er) {
            $this->view->generatePage('friends_list_template.php', ['error' => $er->getMessage()]);
        }

    }

    public function deleteImage(){
        $this->model->deletePicture($_SESSION['userId']);
        redirect("http://localhost:8080/todo-list/user");
    }
}