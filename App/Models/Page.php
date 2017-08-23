<?php

class Page
{
    protected $head = 'Views/Template/head.php';
    protected $header = 'Views/Template/header.php';
    protected $nav = 'Views/Template/nav.php';
    protected $body;
    protected $footer = 'Views/Template/footer.php';

    public function __construct($body = 'Views/home.php')
    {
        $this->body = $body;
        $this->template();
    }

    /**
     * Build the Template of the page
     */
    public function template()
    {
        require_once $this->head;
        require_once $this->header;
        require_once $this->nav;
        require_once $this->body;
        require_once $this->footer;
    }

}