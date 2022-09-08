<?php

header('Content-Type: application/json; charset=utf-8');

require_once './vendor/autoload.php';
require_once './models/Connection.php';
require_once './models/Document.php';
require_once './controllers/DocumentsController.php';

$connection = new Connection();

$_POST = json_decode(file_get_contents('php://input'), true);

if( DocumentsController::markAsDone($connection, $_POST['id'], $_POST['status']) )
{
    echo json_encode(["Status"=>"Success"]);
}
else
{
    echo json_encode(["Status"=>"Error"]);
}