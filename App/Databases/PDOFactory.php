<?php

/**
 * Create a static instance PDO
 */
class PDOFactory
{

    /**
     * A PDO static instance of MySQL
     * @return PDO $database
     */
    public static function getMysqlConnexion()
    {
        // Load database config from config.ini
        $config = parse_ini_file('../Config/config.ini');
        // Set PDO options
        $options = [
            PDO::ATTR_PERSISTENT => true, // Cached and re-used connection ->faster web application
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //
            ];

        // Create PDO instance
        try{
            $database = new PDO('mysql:host=' . $config['host'] 
                              . ';dbname='    . $config['dbName'] 
                              . ';charset='   . $config['charset'],
                                                $config['user'], 
                                                $config['password'],
                                                $options
                                );
            return $database;

        } catch(PDOException $e){
            die('Database connection error: '. $e->getMessage());
        }        
    }
}