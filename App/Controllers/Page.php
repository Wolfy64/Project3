<?php

require_once 'Controllers/Router.php';
require_once 'Models/Utils.php';

class Page
{
    protected $commentsManager;

    protected $head;
    protected $header;
    protected $nav;
    protected $body;
    protected $footer;
    protected $data = [];
    protected $router;

    public function __construct(Router $router, $page)
    {
        $this->setTemplate();
        $this->router = $router;
        $this->commentsManager = new CommentsManager();
        $this->$page();
    }

    public function setTemplate()
    {
        $data = Utils::getJSON('Config/template.json');

        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Build the template of the page
     * @param string $body
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

    /**
     * Built the error page
     *
     */
    public function error500()
    {
        $this->template('Errors/500');
    }

}