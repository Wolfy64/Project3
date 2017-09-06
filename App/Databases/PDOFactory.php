<?php

require_once 'Config/config.php';


/**
 * Create a static instance PDO
 */
class PDOFactory
{
    private static $host     = DBHOST;
    private static $dbName   = DBNAME;
    private static $charset  = DBCHARSET;
    private static $user     = DBUSER;
    private static $password = DBPASSWORD;

    /**
     * @return a PDO static instance of MySQL
     */
    public static function getMysqlConnexion()
    {
        // Set PDO options
        $options = [
            PDO::ATTR_PERSISTENT => true, // Cached and re-used connection ->faster web application
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //
            ];

        // Create PDO instance
        try{
            $database = new PDO('mysql:host=' . self::$host .';dbname=' . self::$dbName . ';charset=' . self::$charset, 
                                self::$user, 
                                self::$password,
                                $options
                                );
            return $database;
        } catch(PDOException $e){
            die('Database connection error: '. $e->getMessage());
        }        
    }
}
