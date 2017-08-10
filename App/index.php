<?php

require_once 'Controllers/Router.php';
require_once 'Views/About.php';

$router = new Router();

$router->add('home', 'Home');
$router->add('about', 'About');
$router->add('contact', 'Contact');

$router->loadPage();

// $router->routerRequest();

// ==== TEST ====

require_once 'Models/SQLRequest.php';

