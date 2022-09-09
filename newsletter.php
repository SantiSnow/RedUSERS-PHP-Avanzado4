<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/User.php';
require_once './controllers/DocumentsController.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

$users = User::all($connection);

include './views/newsletter.php';

