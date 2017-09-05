<?php

require_once 'Controllers/Backend.php';
require_once 'Controllers/Frontend.php';

class Router
{
    protected $controller;
    protected $route;

    /**
     * Set attribute $route from URI
     * @return array $route
     */
    public function setRoute(){
        
        if ( isset($_GET['uri']) ){
            $uri = htmlspecialchars($_GET['uri']); 

            return $this->route = explode( '/', $uri );

        } else {

            return $this->route = [''];
        }

    }

    public function getRoute(){ return $this->route; }

    /**
     * Load Controller from attribute $route and start session
     * @return new Object Controller
     */
    public function loadController()
    {
        $this->sesssionStart();
        var_dump($this->route);
        if ( $this->route[0] != 'admin'){
            $this->controller = 'Frontend';
        } else{
            $this->controller = 'Backend';
        }
        
        return $controller = new $this->controller();
    }

    /**
     * Start session
     * @return $_SESSION
     */
    public function sesssionStart()
    {
        return session_start();
    }

}