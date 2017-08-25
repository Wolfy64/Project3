<?php

require_once 'Models/BlogPost.php';
require_once 'Models/SQLRequest.php';

class BlogPostManager extends SQLRequest
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
     * @return object BlogPost
     */
    public function read(int $id)
    {
        $sql = 'SELECT * FROM blogAlaska WHERE id = :id';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();
        $data = $dbh->fetch(PDO::FETCH_ASSOC);
        
        if ( $data != FALSE){
            return new BlogPost($data);
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
        $sql = 'SELECT * FROM blogAlaska';
        $dbh = $this->executeRequest($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $post ) {
            $postList[] = new Blogpost($post);
        }

        return $postList;
    }
}