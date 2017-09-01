<?php

require_once 'Controllers/Controller.php';

abstract class Router
{
    /**
     * Load Page from the uri 
     * @return new Object
     */
    public static function loadPage()
    {
        session_start();

        // Check if that URI page exist otherwise load the default Index page
        if ( isset($_GET['uri']) ){ 
            $uriPage = htmlspecialchars($_GET['uri']);

            if ( method_exists('Controller',$uriPage) ){
                new Controller($uriPage);
            } else {
                new Controller();
            }

        }else {
            new Controller();
        }
    }
}