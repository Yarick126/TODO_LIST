<?php 

class About_Controller extends Controller {

    function __construct(){
        $this->view = new View();
    }

    function default(){
        $this->view->generatePage('about_template.php');
    }
}