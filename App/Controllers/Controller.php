<?php

require_once 'Controllers/Page.php';
require_once 'Models/PostManager.php';
require_once 'Models/CommentsManager.php';
require_once 'Models/Connection.php';

require_once 'Models/Utils.php';

class Controller extends Page
{
    protected $postManager;
    protected $commentsManager;
    protected $connection;
    protected $page;

    public function __construct(string $method = 'index')
    {
        session_start();
        $this->postManager = new PostManager();
        $this->commentsManager = new CommentsManager();
        $this->connection = new Connection();
        $this->$method();
        
    }

    /**
     * Built the index page by default
     */
    public function index()
    { 
        $this->template('home');
    }

    /**
     * Built the page of Alaska book
     */
    public function alaska()
    {
        if ( !isset($_GET['post']) ){
            $data = $this->postManager->readAllPost();
            $this->template('alaskaList', $data);

        } elseif ( !is_numeric($_GET['post']) ){
            $this->template('404');

        } else {
            $data = $this->postManager->read($_GET['post']);

            if ( $data === FALSE ){
                $this->template('404');
            } else {
                $this->template('alaskaPost', $data);
            }
        }
    }

    /**
     * Built the Admin page
     */
    public function admin()
    {
        if( $this->connection->isAdmin() ){
            $this->template('admin'); 
        } else {
            $this->template('connection');
        }
    }

    /**
     *  Check that connection to the Admin page is allowed
     */
    public function connection()
    {
        if ( $this->connection->isAdmin() ){
            $this->template('admin');

        } elseif( Utils::checkRequest($_POST, ['user', 'password']) ) {
            $user     = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $this->admin( $this->connection->verifyAccount($user, $password) );

        } else {
            $this->template('connection');
        }
    }

    /**
     * @param array from $_POST
     */
    public function addComment()
    {

        if ( Utils::checkRequest($_POST['comment'], ['idBlogAlaska', 'author', 'contents']) ){

            $data = [];
            foreach ($_POST['comment'] as $key => $value) {
                $data += [$key => htmlspecialchars($value)];
            }

            $this->commentsManager->create( $comment = new Comments($data) );
            header('Location: /alaska?post=' . $data['idBlogAlaska']);
        } else {
            $this->template('404');
        }
    }

    public function report()
    {
        if ( Utils::checkRequest($_POST, ['report', 'idBlogAlaska']) ){
            $idComment = intval($_POST['report']);
            $idPost    = intval($_POST['idBlogAlaska']);

            $this->commentsManager->report($idComment);
            header('Location: /alaska?post=' . $idPost);
  
        } else {
            $this->template('404');
        }
        
    }
}