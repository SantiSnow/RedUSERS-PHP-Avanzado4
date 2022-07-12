<?php


interface Authenticable
{
    public function login(Connection $connection, $email, $pass);
    public function register();
    public function logout();
}