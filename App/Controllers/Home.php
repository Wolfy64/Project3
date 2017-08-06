<?php

require_once('Models/PDOFactory.php');
require_once('Models/BlogPostManager.php');
require_once('Models/BlogPost.php');

$test = new BlogPost();
$test->setId(-3);
$test->getId();
var_dump($test);

require_once('Views/layout.php');