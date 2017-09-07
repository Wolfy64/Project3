<?php

require_once '../Controllers/Router.php';

session_start();
$router = new Router();
$router->setRoute();
$router->setController();
$router->setUriPage();

// Ask Router if the request is valid
if ( $router->checkPage() ) {
    $router->loadController();
} else {
    $router->loadController('error404');
}