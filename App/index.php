<?php

if ( isset($_GET['controller']) && isset($_GET['action']) ){
    $controller = htmlspecialchars($_GET['controller']);
    // $action = htmlspecialchars($_GET['action']);
} else{
    $controller = 'home';
    // $action = 'home';
}

switch ($controller) {
    case 'home':
        require_once('Controllers/Home.php');
        break;

    case 'admin':
        require_once('Controllers/Admin.php');
        break;
    
    default:
        require_once('Views/404.php');
        break;
}