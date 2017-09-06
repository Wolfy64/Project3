<?php

require_once 'Controllers/Router.php';

$router = new Router();
// session_start();
$router->sesssionStart();
$router->setRoute();
$router->setController();
$router->setUriPage();

// Ask Router if the request is valid
if ( $router->checkPage() ) {
    $router->loadController();
} else {
    $router->loadController('error404');
}

// var_dump($router->setRoute());
// var_dump($router->setController());
// var_dump($router->setUriPage());
// var_dump($router->checkPage());
// var_dump($_SESSION);
