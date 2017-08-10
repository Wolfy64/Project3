<?php

class Router
{
    private $uri = []; // Uniform Resource Identifier

    /**
     * Build URL route
     * @param string $uri
     */
    public function add($uri)
    {
        $this->uri[] = $uri;
    }

    /**
     * Send URL 
     *
     */
    public function submit()
    {
        if ( isset($_GET['uri']) ){
            $uriGetParam = $_GET['uri'];
        } else {
            $uriGetParam = 'home';
        }

        foreach ($this->uri as $key => $value) {
            if ( preg_match( '#^' . $uriGetParam . '$#', $value ) ){
                echo 'Matched !';
            } else {
                echo ' NOT Matched';
            }
        }
    }


}