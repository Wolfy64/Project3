<?php

class Utils
{
    static protected $errors = [];

    // GETTERS

    /**
     * Read Errors
     * @return array $errors
     */
    public static function getErrors(){ return self::$errors; }

    // METHODS

    /**
     * Check if the value of Array exist or is null
     * @param array $array
     * @param array $param[param1 ,param2, ...] 
     * @return bool
     */
    public static function checkArray($array, array $param)
    {
        foreach ($param as $key => $value) {
            
            if ( !isset($array[$value]) || empty($array[$value]) ){
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
     * Decode JSON file
     * @param string $file
     * @return array
     */
    public static function getJSON(string $file)
    {
        $file = file_get_contents('Config/template.json');
        return json_decode($file, true);
    }
}