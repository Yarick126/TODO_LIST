<?php 

class User_Model extends Model{


    function getAllUsers(){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $users = $ms->query("SELECT idusers ,name, image FROM users ")->fetch_all();
        foreach($users as $key => $user){
            $userData[$key] = [
                'userId' => $user[0],
                'name' => $user[1],
                'image' => $user[2] ,
            ];
            if($userData[$key]['image'] == ''){
                $userData[$key]['image'] = "images/account.png";
            }
        }

        return $userData;
    }

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
        $userData = [
            'userId' => $user['idusers'],
            'name' => $user['name'],
            'email' => $user['email'],
            'image' => $user['image'],
            'token' => $_COOKIE['token']
        ];
        if(!$userData['image']){
            $userData['image'] = "images/account.png";
        }
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