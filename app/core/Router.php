<?php 
    Class Router {

        public static function route(){
            $uriParts = explode('/',$_SERVER['REQUEST_URI']); // СМОТРИМ НА НАШ URL
            $controller_name = 'user'; // НА СЛУЧАЙ , ЕСЛИ ПОЛЬЗОВАТЕЛЬ ПЕРЕХОДИТ НА ЧИСТЫЙ ДОМЕН
            $action_name = 'default';

            if(isset($uriParts[2])){
                $controller_name = $uriParts[2];
                if(isset($uriParts[3])){
                    $action_name = $uriParts[3];
                }
            }

            $controller_file = $controller_name . '_controller.php';
            $controller_path = 'app/controller/' . $controller_file;
            if(file_exists($controller_path)){
                require_once $controller_path; // ВКЛЮЧАЕМ ФАЙЛ ДЛЯ СОЗДАНИЯ ОБЪЕКТА КЛАССА
            }
            $model_file = ucfirst($controller_name) . '_model.php';
            $model_path = 'app/model/' . $model_file;
            if(file_exists($model_path)){
                require_once $model_path;   // ВКЛЮЧАЕМ ФАЙЛ ДЛЯ ВЫЗОВА МЕТОДА КЛАССА
            }            
            $controller_class = ucfirst($controller_name) . '_Controller';
            $controller_obj = new $controller_class; // СОЗДАЕМ ОБЪЕКТ КОНТРОДДЕРА
            if(method_exists($controller_obj, $action_name)){
                $controller_obj->$action_name(); // ВЫЗЫВАЕМ МЕТОД НАПРИМЕР USER->DEFAULT()
            }
        }
    }