<?php

require_once 'Controllers/Router.php';

class Page
{
    protected $commentsManager;

    protected $head   = 'Views/Template/head.php';
    protected $header = 'Views/Template/header.php';
    protected $nav    = 'Views/Template/nav.php';
    protected $body   = 'Views/404.php';
    protected $footer = 'Views/Template/footer.php';
    protected $data = [];

    public function __construct($page)
    {
        $this->commentsManager = new CommentsManager();
        $this->$page();
        var_dump($_SESSION);
    }

    /**
     * Build the template of the page
     * @param string $body
     */
    public function template(string $body, $data = null)
    {
        var_dump($body);
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

    public function addData($data)
    {
        return $this->data[] = $data;
    }

    /**
     * Built the index page by default
     */
    public function index()
    { 
        $this->template('Frontend/home');
    }

    /**
     * Built the error page
     *
     */
    public function error404()
    {
        $this->template('Errors/404');
    }

}