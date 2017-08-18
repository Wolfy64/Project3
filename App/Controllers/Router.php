<?php

// require_once 'Controllers/Home.php';
require_once 'Controllers/Admin.php';
require_once 'Controllers/Alaska.php';
require_once 'Controllers/Books.php';
require_once 'Models/Page.php';

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
     * @return new Object
     */
    public function loadPage()
    {
        // Check if the URI page exist otherwise load Home page
        if ( isset($_GET['uri']) ){ 
            $uriPage = htmlspecialchars($_GET['uri']);

            if ( file_exists('Controllers/' . $uriPage . '.php') ) { 
                new $uriPage();
            } else{
                new Page();
            }

        }else {
            new Page();
        }
    }
}

