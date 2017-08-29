<?php

require 'Models/Data.php';

class CommentsPost extends Data
{
    protected $idBlogAlaska;

    // GETTERS

    public function getIdBlogAlaska(){ return $this->idBlogAlaska; }

    // SETTERS

    public function setIdBlogAlaska(Int $idBlogAlaska)
    {
        if ( $idBlogAlaska > 0 ){
            $this->idBlogAlaska = $idBlogAlaska;
        } else{
            throw new Exception('$idBlogAlaska must be an integer > 0');
        }
    }
}