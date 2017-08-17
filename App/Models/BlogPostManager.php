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

    public function readSummary()
    {
        echo'Hello';
        $sql = 'SELECT contents FROM blogAlaska WHERE id = :id';
        $param = [':id' => 1];
        // $param = [bindParam(':id', 1)];
        // var_dump($this->executeRequest($sql, $param));
        return $this->executeRequest($sql, $param);
    }
}

    // $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
    // $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);
    
    // $q->execute();