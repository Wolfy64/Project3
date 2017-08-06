<?php

require_once('Models/PDOFactory.php');
require_once('Models/PDOManager.php');

$manager = new PDOManager;
$manager->read();

if ( isset($_GET['controller']) && isset($_GET['action']) ){
    $controller = htmlspecialchars($_GET['controller']);
    $action     = htmlspecialchars($_GET['action']);
} else{
    $controller = 'page';
    $action     = 'home';
}

require_once('Views/layout.php');