<?php

require_once('Models/PDOFactory.php');
require_once('Models/BlogPostManager.php');
require_once('Models/BlogPost.php');

$test = new BlogPostManager();
$test->read();
// var_dump($test->count());
// var_dump($test->read());

require_once('Views/layout.php');