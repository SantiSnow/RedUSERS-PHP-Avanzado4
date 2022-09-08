<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/User.php';
require_once './controllers/AuthController.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

if(User::getRole($connection, $user->getId())->getName()==="admin") {
    $result = AuthController::register(
        $connection,
        $_POST['name'],
        $_POST['email'],
        $_POST['password']
    );

    if($result)
    {
        header("Location: ./usuarios.php");
    }
    else{
        echo "Error!";
    }
}
else
{
    header("Location: ./dashboard.php");
}