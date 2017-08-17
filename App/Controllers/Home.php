<?php

require_once 'Models/Page.php';

class Home extends Page
{
    protected $blogPostManager;

    public function __construct()
    {
        parent::__construct();
    }
}