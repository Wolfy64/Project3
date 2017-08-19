<?php

namespace App\Classes;

/**
 * Autoloader for class and namespace
 */
Class Autoloader
{
    /**
     * To load class and it's path via the function autoload
     * @return void
     */
    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Require path and namespace of the class
     * @param $class 
     * @return void
     */
    static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__.'\\', '', $class);
        require '../Classes/'. $class.'.php';
    }
}