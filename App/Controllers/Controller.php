<?php

require_once 'Models/BlogPostManager.php';
require_once 'Models/Connection.php';
require_once 'Models/Page.php';

class Controller extends Page
{
    protected $blogPostManager;
    protected $connection;
    protected $page;

    public function __construct($method = 'index')
    {
        $this->blogPostManager = new BlogPostManager();
        $this->connection = new Connection();
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

    public function admin($param =  FALSE)
    {
        if( $param === TRUE ){
            parent::__construct('Views/admin.php'); 
        } else {
            parent::__construct('Views/connection.php');
        }
    }

    public function connection()
    {
        if ( isset($_POST['user'], $_POST['password']) ){
            $this->connection->verifyPassword();
        } else{
            parent::__construct('Views/connection.php');
        }
    }

}