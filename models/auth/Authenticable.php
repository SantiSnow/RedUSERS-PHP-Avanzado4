<?php


interface Authenticable
{
    public static function login(Connection $connection, $email, $password);
    public static function logout();
}