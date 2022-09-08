<?php

require_once './vendor/autoload.php';
require_once './controllers/AuthController.php';
require_once './models/Connection.php';
require_once './models/User.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

if(User::getRole($connection, $user->getId())->getName()==="admin") {
    include 'views/crear-usuario.php';
    $connection->close_connection();
}
else
{
    $connection->close_connection();
    header("Location: ./dashboard.php");
}