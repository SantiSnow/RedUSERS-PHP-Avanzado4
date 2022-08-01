<?php

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/Document.php';
require_once './controllers/DocumentsController.php';

session_start();
if(!isset( $_SESSION['id'] )){
    header("Location: ./login.php");
}

$connection = new Connection();
$user = $_SESSION['user'];

$result = DocumentsController::saveDocument(
    $connection,
    $_POST['name'],
    $_FILES['document']['name'],
    $_FILES['document']['tmp_name'],
    pathinfo($_FILES['document']['name'], PATHINFO_EXTENSION)
);

$connection->close_connection();
if($result)
{
    echo "Archivo subido";
}
else{
    echo "Error";
}