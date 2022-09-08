<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/User.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

if(User::getRole($connection, $user->getId())->getName()==="admin") {

    $users = User::all($connection);

    include 'views/usuarios.php';
}
else
{
    header("Location: ./dashboard.php");
}