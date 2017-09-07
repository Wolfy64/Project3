<?php

require_once '../Controllers/Backend.php';
require_once '../Controllers/Frontend.php';

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
     * Set $route propertie from URI (Uniform Resource Identifier)
     * If URI empty set "Index"
     * @return Void
     */
    public function setRoute()
    {
        if ( isset($_GET['uri']) ){
            $uri = htmlspecialchars($_GET['uri']); 
            $this->route = explode( '/', $uri );

        } else {
            $this->route = ['index'];
        }
    }

    /**
     * Set controller from propertie $route
     * @return string $controller;
     */
    public function setController()
    {
        if ( $this->route[0] != 'admin'){
            $this->controller = 'Frontend';

        } else{
            $this->controller = 'Backend';
        }
    }

    /**
     * Read the first parameter of propertie $route[]
     * and set uriPage propertie
     * @return Void
     */
    public function setUriPage()
    {
        $route = $this->route;
        $controller = $this->controller;

        switch ($controller) {
            case 'Frontend':
                // Read the first parameter 
                $this->uriPage = $route[0]; 
                break;

            case 'Backend':
                // Read the second parameter => /admin/[parameter]
                $this->uriPage = $route[1];
                break;
            
            default:
                $this->loadController('error500');
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
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Load Controller from propertie $route
     * @return new Object Controller
     */
    public function loadController(string $methodName = NULL)
    {
        $controller = $this->controller;

        if ( $methodName != NULL ){
            // Load Controller
             return new $controller($this, $methodName);
        } else{
            // Load Controller whith first parameter of URI (Page)
            return new $controller($this, $this->uriPage);
        }
    }
}