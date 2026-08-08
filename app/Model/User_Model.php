<?php 

class User_Model extends Model{

    function getUser($userId){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT * FROM users WHERE idusers = " . $userId)->fetch_assoc();
        if(!$user){
            $ms->close();
            throw new Exception('User not found!', 501);    
        }

        if(!isset($_COOKIE['token'])){
            throw new Exception('Not authorized user!',401);
        }
        /*if($_COOKIE['token']!=$user['token']){
            throw new Exception('Not authorized user!',401);
        }*/
        $userData = [
            'userId' => $user['idusers'],
            'name' => $user['name'],
            'email' => $user['email'],
            'image' => $user['image'],
            'token' => $_COOKIE['token']
        ];
        $ms->close();
        return $userData;
    }

    function logout($userId){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $ms->query("UPDATE users SET token = '' WHERE idusers = " . $userId);
        setcookie('token', '');
        $ms->close();
    }
}