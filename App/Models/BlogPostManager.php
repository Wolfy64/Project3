<?php

require_once('PDOFactory.php');
require_once('BlogPost.php');

/**
 *
 *
 */
class BlogPostManager extends BlogPost
{
    public $db;

    public function __construct()
    {
        $this->db = PDOFactory::getMysqlConnexion();
    }

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
        $dbh = $this->db->query('SELECT * FROM Blog'); // Database Handle
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
}