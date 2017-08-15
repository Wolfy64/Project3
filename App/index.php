<?php

require_once 'Controllers/Router.php';

$router = new Router();

$router->add('home', 'Home');
$router->add('book', 'Book');
$router->add('about', 'About');
$router->add('contact', 'Contact');

$router->loadPage();

// ==== TEST ====




