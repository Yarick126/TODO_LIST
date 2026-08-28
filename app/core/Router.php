<?php 
    Class Router {

        public static function route(){
            $uriParts = explode('/',$_SERVER['REQUEST_URI']);
            $controller_name = 'welcome';
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
                include $controller_path;
            }
            else {
                throw new Exception("Cant find controller path: " . $controller_path, 501);
            }
            $model_file = ucfirst($controller_name) . '_model.php';
            $model_path = 'app/model/' . $model_file;
            if(file_exists($model_path)){
                include $model_path;
            }            
            else {
                throw new Exception("Cant find module: " . $model_path, 501);
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