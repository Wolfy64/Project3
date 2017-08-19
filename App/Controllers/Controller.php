<?php

require_once 'Models/BlogPostManager.php';
require_once 'Models/Page.php';

class Controller extends Page
{
    protected $blogPostManager;
    protected $page;

    public function __construct($method = 'index')
    {
        $this->blogPostManager = new BlogPostManager();
        $this->$method();
    }

    public function index(){ parent::__construct(); }

    public function alaska()
    {
        if ( isset($_GET['post']) ){
            parent::__construct('Views/alaskaPost.php');
        } else {
            parent::__construct('Views/alaskaList.php');
        }
    }

    public function admin()
    {
        if ( isset($_POST['']) ){
            echo 'connection';
        }else{
            echo '<h1>Page Admin</h1>';
            parent::__construct('Views/connection.php');
        }        
    }
}