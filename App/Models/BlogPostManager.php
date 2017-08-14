<?php

require_once 'SQLRequest.php';

/**
 *
 *
 */
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
     *
     *
     */
    public function read()
    {
        $posts = [];
        $dbh = $this->db->query('SELECT * FROM blogAlaska'); // Database Handle
        while($data = $dbh->fetch(PDO::FETCH_ASSOC)){
            $posts[] = new BlogPost($data);
        }
        return $posts;
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

    // METHOD

    public  function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM Blog')->fetchColumn();
    }

    public function readAll()
    {
        $sql = 'SELECT * FROM blogAlaska';
        return $this->executeRequest($sql);
    }
}