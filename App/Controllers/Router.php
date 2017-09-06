<?php

require_once 'Controllers/Backend.php';
require_once 'Controllers/Frontend.php';

class Router
{
    protected $controller;
    protected $route;
    protected $uriPage;

    // GETTERS

    public function getRoute(){ return $this->route; }

    public function getUriPage(){ return $this->uriPage; }

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
     * Read the first parameter of attribute $route[] 
     * @return string 
     */
    public function setUriPage()
    {
        $uriPage = $this->route;
        $controller = $this->controller;

        switch ($controller) {
            case 'Frontend':
                // Read the first parameter
                return $this->uriPage = current($uriPage); 
                break;

            case 'Backend':
                // Move the cursor to the next value and read the first parameter
                return $this->uriPage = next($uriPage);
                break;
            
            default:
                return $this->loadController('error500');
                break;
        }
        
    }

    // METHODS

    /**
     * Check if the Page exist (Page = Method of Class Controller)
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

    /**
     * Load Controller from attribute $route
     * @return new Object Controller
     */
    public function loadController(string $page = Null)
    {
        $controller = $this->controller;
        // var_dump( $controller->isAdmin );

        if ( $page != Null ){
            // Load Controller
             return new $this->controller($this, $page);
        } else{
            // Load Controller whith first parameter of URI (Page)
            return new $this->controller($this, $this->uriPage);
        }

    }

    /**
     * Start session
     * @return $_SESSION
     */
    public function sesssionStart()
    {
        if (!isset($_SESSION)){
            
            return session_start();

        } elseif ( !isset($_SESSION['admin']) ){

            return $_SESSION['admin'] = False;
        }

    }
}