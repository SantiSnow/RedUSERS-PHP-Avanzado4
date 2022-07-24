<?php

require_once 'Controller.php';

class AuthController extends Controller
{

    public static function login(Connection $connection, $email, $password)
    {
        return User::login($connection, self::escapeData($email), self::escapeData($password));
    }
}