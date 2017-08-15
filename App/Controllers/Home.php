<?php

require_once 'Models/Page.php';

class Home extends Page
{
    protected $blogPostManager;

    public function __construct()
    {
        echo 'This is the ' . __CLASS__ . ' page';
        parent::__construct();
    }

    public function view()
    {
        require_once 'Views/Template/home.php';
    }
}