<?php

require_once('Models/PDOFactory.php');

function getPost(){
    $database = getDb();
    $blogPost = $database->query('SELECT * FROM blogAlaska');
    return $blogPost;
}

function getDb(){
    return PDOFactory::getMysqlConnexion();
}