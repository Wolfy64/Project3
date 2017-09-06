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

        $uri = $_GET['uri'];

        // String analysis
        $parts = explode("/", $uri);

        if ($parts[0] == "admin") { // /admin

            // cas #1
            $admin = true;
            $controler = new Backend();
            $parts = array_shift($parts);

        } else {

            // cas #2
            $controler = new Frontend();
        }

        // tableau parts cas 1 : ['admin', 'comments', '..'] => ['comments', '..']
        // tableau parts cas 2 : ['alaska', '..']

        //////////////////////////////////////

        // On enregistre notre sous-controler (ou nom de méthode)
        $sub_controler = $parts[0];
        $parts = array_shift($parts);

        // tableau parts cas 1 : ['admin', 'comments', '..'] => ['comments', '..'] => ['..']
        // tableau parts cas 2 : ['alaska', '..'] =>  => ['..']




        //////////////////////////////////////
        // Technique numéro 1 : la bourrine 

        if ($sub_controler == "" || $sub_controler == "index")
            $controler->index(); // ['page', '1']
        else if ($sub_controler == "delete")
            $controler->deleteComment($parts); // [comment', '1'] /admin/delete/1
        else
            $controler->404();


        //////////////////////////////////////
        // Technique numéro 2 : la propre

        // Le routeur demande :
        // hey ! As-tu une méthode qui s'apppele $sub_controler ? 
        // le controler répond : "- oui ou non"


        if (!$controler->hasAndRegisterSubControler($sub_controler))
            $controler->error404($parts);
        else
            $controler->execute($parts);




    }
}