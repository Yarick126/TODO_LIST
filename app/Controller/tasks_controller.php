
<?php
require_once 'app/utils.php';
class Tasks_Controller extends Controller{
    function __construct(){
        $this->model = new Tasks_Model();
        $this->view = new View();
    }

    public function default(){
        $this->view->generatePage('tasks_template.php');        
    }
}