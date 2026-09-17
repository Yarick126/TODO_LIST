<?php 
    Class Router {

        public static function route(){
            $uriParts = explode('/',$_SERVER['REQUEST_URI']);
            $controller_name = 'user';
            $action_name = 'default';
            $styles = 'style/welcome_styles.css';

            if($uriParts[2]){
                $controller_name = explode('?', $uriParts[2])[0];
                $styles = 'style/' . $controller_name . '_styles.css';
            }
            if(isset($_GET['action'])){
                $action_name = $_GET['action'];
                $styles = 'style/' . strtolower(substr($action_name , strpos($action_name,'open')+4)) . '_styles.css';
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
            AssetsManager::addStyles($styles);
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