<?php

require_once 'Models/Model.php';

class BlogPost extends Model
{
    // Renvoie la liste des billets du blog
    function getPostList(){
        $sql = 'SELECT * FROM blogAlaska';
        $blogPostList = $this->executeRequest($sql);
        return $blogPostList;
    }

    // Renvoie les informations sur un billet
    function getPost($idPost){
        $sql = 'SELECT * FROM blogAlaska WHERE id=?';
        $blogPost = $this->executeRequest($sql, array($idPost));
        if ( $blogPost->rowCount() == 1 ){
            return $blogPost->fetch(); // Accès à la première ligne de résultat
        }else{
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idPost'");
        }
    }
}