<?php

require_once 'Controller.php';

class AuthController extends Controller
{

    public static function login(Connection $connection, $email, $password)
    {
        return User::login($connection, self::escapeData($email), self::escapeData($password));
    }

    public static function register(Connection $connection, $name, $email, $password)
    {
        $user = new User(1, self::escapeData($name), self::escapeData($email), self::escapeData($password));
        return $user->save($connection);
    }
}