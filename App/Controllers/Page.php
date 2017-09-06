<?php

require_once 'Controllers/Router.php';
require_once 'Models/Utils.php';

class Page
{
    protected $head;
    protected $header;
    protected $nav;
    protected $body;
    protected $footer;

    protected $commentsManager;
    protected $data = [];
    protected $router;

    public function __construct(Router $router, $page)
    {
        $this->setTemplate();
        $this->router = $router;
        $this->commentsManager = new CommentsManager();
        $this->$page();
    }

    /**
     * Set Template from Config
     *
     */
    public function setTemplate()
    {
        $data = Utils::getJSON('Config/template.json');

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Build page template
     * @param string $body
     * @param $data = null
     * @return Void
     */
    public function template(string $body, $data = null)
    {
        $this->setBody($body);
        $this->addData($data);
        require_once $this->head;
        require_once $this->header;
        require_once $this->nav;
        require_once $this->body;
        require_once $this->footer;
    }

    /**
     * Defined which file to use for body
     * @param string $body
     */
    public function setBody(string $body)
    {
        if ( file_exists('Views/' . $body . '.php') ){
            $this->body = 'Views/' . $body . '.php';
        } else{
            $this->body = 'Views/Errors/500.php';
        }      
    }

    /**
     * Add $data for Page
     * @param $data
     * @return array $data
     */
    public function addData($data)
    {
        return $this->data[] = $data;
    }

    // PAGE

    /**
     * Built the index page by default
     * @return Void
     */
    public function index()
    { 
        return $this->template('Frontend/home');
    }

    /**
     * @return bool
     */
    public function isAdmin() // A VOIR EN SESSION !!!!!!!!!!!!!!!!!!!!!
    {
        if ( !isset($_SESSION['admin']) || $_SESSION['admin'] != TRUE ){

            return $this->template('Frontend/connection');

        } else {
            
            return $this->template('Backend/admin'); // CETTE REDIRECTION
        }
    }

    /**
     * Built the 404 error page
     * @return Void
     */
    public function error404()
    {
        $this->template('Errors/404');
    }

    /**
     * Built the 500 error page
     * @return Void
     */
    public function error500()
    {
        $this->template('Errors/500');
    }

}