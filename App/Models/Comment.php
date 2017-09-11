<?php

require '../Models/Data.php';

class Comment extends Data
{
    protected $idP3Blog;

    // GETTERS

    public function getIdP3Blog(){ return $this->idP3Blog; }
    
    // SETTERS

    public function setIdP3Blog(Int $idP3Blog)
    {
        if ( $idP3Blog > 0 ){
            $this->idP3Blog = $idP3Blog;
        } else{
            throw new Exception('$idP3Blog must be an integer > 0');
        }
    }
}