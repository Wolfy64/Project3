<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';


class Alaska extends Page
{
    protected $blogPostManager;

    public function __construct($body ='Views/book.php')
    {
        $this->blogPostManager = new BlogPostManager();
        $this->loadAction();
    }

    public function loadAction()
    {
        if ( isset($_GET['post']) ){
            parent::__construct('Views/alaskaPost.php');
        } else {
            parent::__construct('Views/alaskaList.php');
        }
    }
}