<?php

require_once('Models/PDOFactory.php');
require_once('Models/BlogPostManager.php');
require_once('Models/BlogPost.php');

$test = new BlogPost();
$var = DateTime('2000-01-01');
echo $var;
$test->setDatePost($var);
$test->getDatePost();
var_dump($test);

require_once('Views/layout.php');