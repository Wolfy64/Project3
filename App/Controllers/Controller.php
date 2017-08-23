<?php

require_once 'Models/BlogPostManager.php';
require_once 'Models/Connection.php';
require_once 'Models/Page.php';

class Controller extends Page
{
    protected $blogPostManager;
    protected $connection;
    protected $page;

    public function __construct(string $method = 'index')
    {
        $this->blogPostManager = new BlogPostManager();
        $this->connection = new Connection();
        $this->$method();
    }

    /**
     * Built the index page by default
     */
    public function index(){ parent::__construct(); }

    /**
     * Built the page of Alaska book
     */
    public function alaska()
    {
        if ( isset($_GET['post']) ){
            parent::__construct('Views/alaskaPost.php');
        } else {
            parent::__construct('Views/alaskaList.php');
        }
    }

    /**
     * Built the Admin page
     */
    public function admin(bool $param =  FALSE)
    {
        if( $param === TRUE ){
            parent::__construct('Views/admin.php'); 
        } else {
            parent::__construct('Views/connection.php');
        }
    }

    /**
     *  Check that connection to the Admin page is allowed
     */
    public function connection()
    {
        if ( isset($_POST['user'], $_POST['password']) ){
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $this->admin($this->connection->verifyAccount($user, $password));

        } else{
            parent::__construct('Views/connection.php');
        }
    }
}