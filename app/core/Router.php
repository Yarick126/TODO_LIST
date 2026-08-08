<?php 
    Class Router {
        function mb_ucfirst($str) {
            $fc = mb_strtoupper(mb_substr($str, 0, 1));
            return $fc . mb_substr($str, 1);
        }
        public static function route(){
            $uriParts = explode('/',$_SERVER['REQUEST_URI']);
            $controller_name = 'Welcome';
            $action_name = 'default';
            if($uriParts[2]){
                $controller_name = mb_ucfirst(explode('?', $uriParts[2])[0]);
            }
            if(isset($_GET['action'])){
                $action_name = $_GET['action'];
            }
            $controller_file = $controller_name . '_Controller.php';
            $controller_path = 'app/controller/' . $controller_file;
            if(file_exists($controller_path)){
                include $controller_path;
            }
            else {
                throw new Exception("NOT FOUND: " . $controller_path, 404);
            }
            $model_file = $controller_name . '_Model.php';
            $model_path = 'app/model/' . $model_file;
            if(file_exists($model_path)){
                include $model_path;
            }            
            else {
                throw new Exception("Server problem", 501);
            }
            
            $controller_class = $controller_name . '_Controller';
            $controller_obj = new $controller_class;
            if(method_exists($controller_obj, $action_name)){
                $controller_obj->$action_name();
            }
            else {
                throw new Exception('Method ' . $action_name . 'does not exist in class ' . $controller_class, 501);
            }
        }
    }