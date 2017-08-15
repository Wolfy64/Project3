<?php

require_once 'Controllers/About.php';
require_once 'Controllers/Contact.php';
require_once 'Controllers/Home.php';
require_once 'Controllers/Book.php';

class Router
{
    private $uri = []; // Uniform Resource Identifier
    private $page = [];

    /**
     * Build URL route
     * @param string $uri
     * @param string $page default = NULL
     */
    public function add($uri, $page = NULL)
    {
        $this->uri[] = $uri;

        if ( $page != NULL ){
            $this->page[] = $page;
        }
    }

    /**
     * Load Page from the uri 
     * @return void Object
     */
    public function loadPage()
    {
        // Check if the URI page exist otherwise load Home page
        if ( isset($_GET['uri']) ){ 
            $uriPage = $_GET['uri'];

            if ( in_array( $uriPage, $this->uri ) ){ 
                foreach ($this->uri as $key => $value) {
                    if ( preg_match( '#^' . $uriPage . '$#', $value ) ){
                        return new $this->page[$key]();
                    }
                }
            } else{
                new Home;
            }

        }else {
            new Home;
        }
    }

}

