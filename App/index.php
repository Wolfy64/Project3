<?php

require_once 'Controllers/Router.php';

$router = new Router();
$router->setRoute();
$router->setController();
$router->setUriPage();


if ( $router->checkPage() ) {
    $router->loadController();
} else {
    $router->loadController('error404');
}