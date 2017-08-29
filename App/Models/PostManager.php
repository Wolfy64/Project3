<?php

require_once 'Models/Post.php';
require_once 'Models/SQLRequest.php';

class PostManager extends SQLRequest
{

    // CRUD SYSTEM

    /**
     * @param void
     * @return void
     */
    public function create()
    {

    }

    /**
     * @param $id
     * @return object Post
     */
    public function read(int $id)
    {
        $sql = 'SELECT * FROM blogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();
        $data = $dbh->fetch(PDO::FETCH_ASSOC);
        
        if ( $data != FALSE){
            return new Post($data);
        } else {
            return FALSE;
        }
    }

    /**
     *
     *
     */
    public function update()
    {

    }

    /**
     *
     *
     */
    public function delete()
    {

    }

    // OTHER METHODS

    /**
     * @param void
     * @return array
     */
    public function readAllPost()
    {
        $postList = [];
        $sql  = 'SELECT * FROM blogAlaska';
        $dbh  = $this->getDatabase()->query($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $post ) {
            $postList[] = new Post($post);
        }

        return $postList;
    }
}