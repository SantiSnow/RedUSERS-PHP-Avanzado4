<?php

require_once './vendor/autoload.php';
include './models/User.php';
include './models/Connection.php';

$user = new User("Santiago", "santi@gmail.com", "1234");

$user->getProperties();

$connection = new Connection();