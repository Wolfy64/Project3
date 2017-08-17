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
    public function read($id)
    {
        $sql = 'SELECT contents FROM blogAlaska WHERE id = :id';


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
