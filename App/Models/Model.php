<?php
require_once('PDOFactory.php');


function getPostList(){
    $database = getDb();
    $blogPostList = $database->query('SELECT * FROM blogAlaska ');  
    return $blogPostList;
}

function getDb(){
    return PDOFactory::getMysqlConnexion();
}

function getComments($idPost){
    $database = getDb();
    $comments = $database->prepare('SELECT * FROM commentsBlogAlaska WHERE id=?');
    $comments->execute(array($idPost));
    return $comments;
}

function getPost($idPost){
    $database = getDb();
    $blogPost = $database->prepare('SELECT * FROM blogAlaska WHERE id=?');  
    $blogPost->execute(array($idPost));
    if ( $blogPost->rowCount() == 1 ){
        return $blogPost->fetch();
    }else{
        throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
}



}