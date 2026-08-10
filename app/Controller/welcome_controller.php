<?php 
require_once 'app/utils.php';
class Welcome_Controller extends Controller {


    function __construct(){
        $this->view = new View();
    }
    public function default(){
        $this->view->generatePage('welcome_template.php');
    }

}