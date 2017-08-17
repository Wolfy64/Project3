<?php

require_once 'Controllers/Router.php';

$router = new Router();

$router->add('books', 'Books');

$router->loadPage();

// ==== TEST ====




