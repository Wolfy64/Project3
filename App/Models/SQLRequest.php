<?php

require_once 'Databases/PDOFactory.php';

abstract class SQLRequest
{
    private $database;

    /**
     * Return an instance of PDO
     * @return Object PDO
     */
    private function getDatabase()
    {
        if ( $this->database == NULL ){
            $this->database = PDOFactory::getMysqlConnexion();
        }

        return $this->database;
    }

    /**
     * Do a prepare SQL request if $params is not NULL otherwise do a query SQL request
     * @param string $sql
     * @param string $param default = NULL
     * @return dabase request
     */
    public function executeRequest($sql, $param =  NULL)
    {
        if ( $param != NULL ){
            $result = $this->getDatabase()->prepare($sql, $param);
            $result->execute($param);
        } else {
            $result = $this->getDatabase()->query($sql);
        }

        return $result;
    }

}