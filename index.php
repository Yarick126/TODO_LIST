<?php
declare(strict_types=1);
ini_set('display_errors',1);
ini_set('session.use_strict_mode','1');
session_set_cookie_params([
    'lifetime'=> 0,
    'path' => '/',
    'domain'=> '',
    'secure'=> isset($_SERVER['HTTPS']),
    'httponly' => true,
    'samesite' => 'Lax'
]);

require_once 'app/bootstrap.php';

