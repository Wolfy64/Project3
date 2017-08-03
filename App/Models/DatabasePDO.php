<?php

/**
 *
 *
 */
class DatabasePDO
{
    private $host = 'localhost';
    private $dbName = 'OC_Projet-3';
    private $charset = 'utf8';
    private $user = 'root';
    private $password = 'root';

    private $dbh;
    private $error;

    public function __construct()
    {
        // Set Data Source Name
        $dsn = 'mysql:host=' . $this->host . ';dbName=' . $this->dbName . ';charset=' . $this->charset;

        // Set options
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        // Create a new PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->password, $options);
        } catch(PDOException $e){
            die('Data base connection error: ' . $e->getMessage());
        }
    }

    function getDbh()
    {
        return $this->dbh;
    }
}