<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/User.php';
require_once './models/Mailer.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

$subject = $_POST['subject'];
$body = $_POST['body'];

$users = User::all($connection);

$mailer = new Mailer();
$mailer->sendNewsletter($subject, $body, $users);

include './views/envio.php';

