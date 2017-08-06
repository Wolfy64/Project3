<?php

/**
 *
 *
 */
class PDOManager
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
        $db = $this->db;
        $answer = $db->query('SELECT * FROM Blog');
        $data = $answer->fetch();
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