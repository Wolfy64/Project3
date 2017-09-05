<?php

class Utils
{
    static protected $errors = [];

    /**
     * To check if the value of Array exist or is null
     * @param array $array
     * @param array $param[param1 ,param2, ...] 
     * @return bool
     */
    public static function checkArray($array, array $param)
    {
        var_dump($param);
        foreach ($param as $key => $value) {
            
            if ( !isset($array[$value]) || empty($array[$value]) ){
                self::$errors[] = $value . ' is NULL !';
            }
        }
        var_dump(self::$errors);
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
            return $value;
        }
    }
}