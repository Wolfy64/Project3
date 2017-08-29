<?php

class Utils
{
    static protected $errors = [];

    /**
     * To check if the Method (POST/GET) exist or is null
     * @param $method (POST,GET)
     * @param array $data[param1 ,param2, ...] 
     * @return bool
     */
    public static function checkRequest($method, array $data)
    {
        foreach ($data as $key => $value) {
            
            if ( !isset($method[$value]) || empty($method[$value]) ){
                self::$errors[] = $value . ' is NULL !';
            }
        }

        if (  empty(self::$errors) ){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Read Errors
     */
    private static function getErrors()
    {
        foreach ( self::$errors as $key => $value ) {
            echo $value . '</br>';
        }
    }
}