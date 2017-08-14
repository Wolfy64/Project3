<?php

require_once 'Models/Model.php';

class BlogComments extends Model
{
    // Renvoie la liste des commentaires associés à un billet
    function getComments($idPost){
        $sql = 'SELECT * FROM commentsBlogAlaska WHERE id=?';
        $comments = $this->executeRequest($sql, array($idPost));
        return $comments;
    }
}