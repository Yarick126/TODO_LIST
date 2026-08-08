<?php

class Auth_Model extends Model{
    private static string $token = '';

    private static function generateToken(){
        self::$token = bin2hex(random_bytes(15));
    }

    function addUser($userData){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT  * FROM users WHERE email = '" . $userData['email'] . "'")->fetch_assoc();
        if($user){
            $ms->close();
            throw new Exception('User already exist');
        }
        self::generateToken();
        $ms->query("INSERT INTO users(name, email, password, token) VALUES ('" . $userData['name'] . "' ," . "'" . $userData['email'] . "' , " . "'" . $userData['password'] . "' , " . "'" . self::$token . "')");
        $ms->close();
        setcookie('token', self::$token);
        return ['name' => $userData['name'], 'email'=> $userData['email']];
    }

    function checkUser($userData){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT idusers, email, password FROM users WHERE email = '" . $userData['email'] . "'")->fetch_assoc();
        if(!$user){
            $ms->close();
            throw new Exception('Didnt find user with this email');
        }
        if(!password_verify($userData['password'], $user['password'])){
            $ms->close();
            throw new Exception('Wrong password');
        }
        self::generateToken();
        $res = $ms->query("UPDATE users SET token = '" . self::$token . "' WHERE email = '" . $user['email'] . "'");
        if(!$res){
            $ms->close();
            throw new Exception('Token didnt updated!');
        }
        setcookie('token', self::$token);
        $ms->close();

        return ['userId' => $user['idusers'], 'token' => self::$token ];
    }
}