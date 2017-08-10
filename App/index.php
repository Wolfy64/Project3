<?php

require_once 'Controllers/Router.php';

$router = new Router();

$router->add('home');
$router->add('about');
$router->add('contact');

$router->submit();

echo '<pre>';
print_r($router);


// $router->routerRequest();