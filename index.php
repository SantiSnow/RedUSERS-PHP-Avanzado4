<?php

require_once './vendor/autoload.php';
include './models/User.php';
include './models/Connection.php';


$user = new User(1, "Santiago", "invitado@gmail.com", "1234");

$user->getProperties();

$connection = new Connection();

echo $user->save($connection);


/*$connection = new Connection();

$user = User::find($connection, 1);
$role = User::getRole($connection, 1);

print $role->getName();*/