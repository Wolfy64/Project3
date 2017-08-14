<?php

require_once 'Controllers/Router.php';

$router = new Router();

$router->add('home', 'Home');
$router->add('about', 'About');
$router->add('contact', 'Contact');

$router->loadPage();

// $router->routerRequest();

// ==== TEST ====




