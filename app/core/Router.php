<?php 
    Class Router {

        public static function route(){
            $uriParts = explode('/',$_SERVER['REQUEST_URI']);
            $controller_name = 'user';
            $action_name = 'default';

            if($uriParts[2]){
                $controller_name = explode('?', $uriParts[2])[0];
            }
            if(isset($_GET['action'])){
                $action_name = $_GET['action'];
            }
            $controller_file = $controller_name . '_controller.php';
            $controller_path = 'app/controller/' . $controller_file;
            if(file_exists($controller_path)){
                require_once $controller_path;
            }
            else {
                $controller_name = 'user';
                require_once "app/controller/user_controller.php";
            }
            $model_file = ucfirst($controller_name) . '_model.php';
            $model_path = 'app/model/' . $model_file;
            if(file_exists($model_path)){
                require_once $model_path;
            }            
            $controller_class = ucfirst($controller_name) . '_Controller';
            $controller_obj = new $controller_class;
            if(method_exists($controller_obj, $action_name)){
                $controller_obj->$action_name();
            }
            else {
                throw new Exception('Method ' . $action_name . 'does not exist in class ' . $controller_class, 501);
            }
        }
    }