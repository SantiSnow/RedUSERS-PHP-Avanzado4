<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/User.php';
require_once './models/Document.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

$documents = null;

if(User::getRole($connection, $_SESSION['id'])->getName()!="admin"){
    $documents = Document::all($connection);
}

include './views/dashboard.php';
