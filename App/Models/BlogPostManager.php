<?php

require_once('PDOFactory.php');
require_once('BlogPost.php');

/**
 *
 *
 */
class BlogPostManager
{
    public $db;

    public function __construct()
    {
        $this->db = PDOFactory::getMysqlConnexion();
    }

    // CRUD

    /**
     * 
     *
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
        $blogPost = [];
        $dbh = $this->db->query('SELECT * FROM Blog'); // Database Handle
        $dbh->execute();

        while ($data = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $data[] = new blogPost($data);
        }
        return $blogPost;

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

    public  function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM Blog')->fetchColumn();
    }
}