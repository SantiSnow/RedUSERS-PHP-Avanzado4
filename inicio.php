<?php

require_once './vendor/autoload.php';
require_once './controllers/AuthController.php';
require_once './models/Connection.php';
require_once './models/User.php';

if(isset($_POST['email']) && isset($_POST['password']))
{
    $connection = new Connection();
    $user = AuthController::login($connection, $_POST['email'], $_POST['password']);
    if($user)
    {
        $connection->close_connection();

        session_start();
        $_SESSION['id'] = $user->getId();
        $_SESSION['user'] = $user;

        header('Location: ./dashboard.php');
        //var_dump($login);
    }
    else{
        echo "Inicio de sesión incorrecto";
    }
}