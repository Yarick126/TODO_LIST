<?php

class Settings_controller extends Controller {

    function __construct(){
        $this->view = new View();
    }

    function default(){
        $this->view->generatePage('settings_template.php');
    }
}