<?php 

class User_Model extends Model{

    function getAllUsers(){
        $stats  = [
            "request" =>'Запрос отправлен',
            "accepted" => 'Друг',
            "rejected" => 'Отклонён'
        ];
        $userData = [];
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $users = $ms->query("SELECT idusers ,name, image FROM users WHERE name LIKE '" . $_POST['friend_name'] . "%'")->fetch_all();
        $stats = $ms->query("SELECT status, id_to FROM friends")->fetch_all();
        foreach($users as $key => $user){
            if($user[0]==$_GET['userId']){
                continue;
            }
            $userData[$key] = [
                'userId' => $user[0],
                'name' => $user[1],
                'image' => $user[2] ,
            ];
            if($userData[$key]['image'] == ''){
                $userData[$key]['image'] = "images/account.png";
            }
            foreach($stats as $stat){
                if($userData[$key]['userId'] == $stat[1]){
                    switch($stat[0]){
                        case 'request':
                            $userData[$key]['status'] = 'Запрос отправлен';
                            break;
                        case 'accepted':
                            $userData[$key]['status'] = 'Друг';
                            break;
                        case 'rejected':
                            $userData[$key]['status'] = 'Запрос отклонен';
                            break;
                    }
                }
            }

        }

        $ms->close();
        return $userData;
    }

    function getUser(){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        if(isset($_GET['userId'])){
            $user = $ms->query("SELECT * FROM users WHERE idusers = " . $_GET['userId'])->fetch_assoc();
        }
        if(isset($_COOKIE['token']) != 0 && !isset($user)){
            $user = $ms->query("SELECT * FROM users WHERE token = '" . $_COOKIE['token'] . "'")->fetch_assoc();
        }
        if(!$user){
            $ms->close();
            throw new Exception('User not found!', 501);    
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

    function addFriend($userId, $friendId){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $user = $ms->query("SELECT id_from FROM friends WHERE (id_from = " .$userId ." OR id_to = " .$userId . ") AND (id_from = " .$friendId ." OR id_to = " .$friendId . ")")->fetch_assoc();
        if($user){
            $ms->close();
            throw new Exception('Already have request!');
        }
        $ms->query("INSERT INTO friends (status, id_to, id_from) VALUES ( 'request', ". $friendId  . ",". $userId .") ");
        $ms->close();
    }

    function getRequests($userId){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $requests = $ms->query("SELECT friends.id_from, users.name, users.image  FROM friends JOIN users ON friends.id_from = users.idusers  WHERE friends.id_to = " .$userId ." AND friends.status = 'request'")->fetch_all();

        $ms->close();
        
        $users = [];
        foreach($requests as $key => $item){
            $users[$key]['name'] = $item[1];
            $users[$key]['id'] = $item[0];
            $users[$key]['image'] = $item[2] == '' ? 'images/account.png' : $item[2];
        }
        return $users;
    }
    function changeStatus($status){
        $ms = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_SCHEMA,DB_PORT);
        $ms->query("UPDATE friends SET status = REPLACE (status , 'request', '". $status . "') WHERE id_to = " .$_GET['userId'] . " AND id_from = " .$_GET['friendId'] );
        
        $ms->close();
    }
}