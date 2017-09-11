<?php

require '../Models/Data.php';

class Comment extends Data
{
    protected $idP3blog;

    // GETTERS

    public function getIdP3blog(){ return $this->idP3blog; }
    
    // SETTERS

    public function setIdP3blog(Int $idP3blog)
    {
        if ( $idP3blog > 0 ){
            $this->idP3blog = $idP3blog;
        } else{
            throw new Exception('$idP3blog must be an integer > 0');
        }
    }
}