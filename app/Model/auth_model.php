<?php

class Auth_Model extends Model{
    private static string $token = '';

    private static function generateToken():void{
        self::$token = bin2hex(random_bytes(15));
    }

    function addUser(array $userData):int{
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT  * FROM users WHERE email = '" . $userData['email'] . "'")->fetch_assoc();

        if($user){
            $ms->close();
            throw new Exception('User already exist');
        }

        self::generateToken();
        $ms->query("INSERT INTO users(name, email, password, token, image) VALUES ('" . $userData['name'] . "' ," . "'" . $userData['email'] . "' , " . "'" . $userData['password'] . "' , " . "'" . self::$token . "', 'images/account.png')");
        $id = $ms->insert_id;
        $ms->close();

        session_regenerate_id(true);
        $_SESSION['token'] = self::$token;
        $_SESSION['userId'] = $id;
        $_SESSION['name'] = $userData['name'];
        $_SESSION['email'] = $userData['email'];
        $_SESSION['image'] = 'images/account.png';

        return $id;
    }

    function getUser(array $userData):int{
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT idusers, email, password, name, image FROM users WHERE email = '" . $userData['email'] . "'")->fetch_assoc();
        if(!$user){
            $ms->close();
            throw new Exception('Didnt find user with this email');
        }
        if(!password_verify($userData['password'], $user['password'])){
            $ms->close();
            throw new Exception('Wrong password');
        }
        self::generateToken();
        $ms->query("UPDATE users SET token = '" . self::$token . "' WHERE email = '" . $user['email'] . "'");
        $ms->close();
        session_regenerate_id(true);
        $_SESSION['token'] = self::$token;
        $_SESSION['userId'] = $user['idusers'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['image'] = $user['image'];

        return $user['idusers'];
    }
}