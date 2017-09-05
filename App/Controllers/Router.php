<?php

require_once 'Controllers/Backend.php';
require_once 'Controllers/Frontend.php';

class Router
{
    protected $controller;
    protected $route;
    protected $uriPage;

    // SETTERS

    /**
     * Set attribute $route from URI (Uniform Resource Identifier)
     * If URI empty set Index
     * @return array $route
     */
    public function setRoute(){
        
        if ( isset($_GET['uri']) ){
            $uri = htmlspecialchars($_GET['uri']); 

            return $this->route = explode( '/', $uri );

        } else {

            return $this->route = ['index'];
        }

    }

    /**
     * Set controller from attribute $route
     * @return string $controller;
     */
    public function setController()
    {

        if ( $this->route[0] != 'admin'){
            return $this->controller = 'Frontend';
        } else{
            return $this->controller = 'Backend';
        }

    }

    /**
     * 
     * @return string 
     */
    public function setUriPage()
    {
        $uriPage = $this->route;
        return $this->uriPage = $this->uriPage = current($uriPage);
    }

    // METHODS

    /**
     * Load Controller from attribute $route and start session
     * @return new Object Controller
     */
    public function loadController(string $page = Null)
    {

        $this->sesssionStart();
        if ( $page != Null ){

             return $controller = new $this->controller($page);
        } else{

            return $controller = new $this->controller($this->uriPage);
        }

    }

    /**
     * Start session
     * @return $_SESSION
     */
    public function sesssionStart()
    {
        return session_start();
    }

    /**
     * Check if the Page exist
     * @return bool
     */
    public function checkPage()
    {

        if ( method_exists($this->controller, $this->uriPage) ){
            return True;
        } else {
            return False;
        }

    }


}