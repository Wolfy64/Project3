<?php

class Admin
{
    protected $blogPostManager;

    public function __construct()
    {
        $this->blogPostManager = new BlogPostManager();
        $this->loadAction();
    }

    public function loadAction()
    {
        echo '<h1>Page Admin</h1>';
    }
}