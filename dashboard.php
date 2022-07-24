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

include './views/dashboard.php';
