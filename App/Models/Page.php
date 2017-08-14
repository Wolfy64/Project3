<?php

class Page
{
    protected $head;
    protected $header;
    protected $nav;
    protected $body;
    protected $footer;

    public function __construct()
    {
        $this->head = 'Views/Template/head.php';
        $this->header = 'Views/Template/header.php';
        $this->nav = 'Views/Template/nav.php';
        $this->body = 'Views/Template/body.php';
        $this->footer = 'Views/Template/footer.php';
        $this->template();
    }

    public function template()
    {
        require_once $this->head;
        require_once $this->header;
        require_once $this->nav;
        require_once $this->body;
        require_once $this->footer;
    }

}