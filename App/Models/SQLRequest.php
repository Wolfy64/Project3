<?php

require_once 'Databases/PDOFactory.php';

abstract class SQLRequest
{
    private $database;

    /**
     * Return an instance of PDO
     * @return Object PDO
     */
    public function getDatabase()
    {
        if ( $this->database == NULL ){
            $this->database = PDOFactory::getMysqlConnexion();
        }

        return $this->database;
    }
}