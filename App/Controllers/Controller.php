<?php

require_once 'Controllers/Page.php';

require_once 'Models/Admin.php';
require_once 'Models/CommentsManager.php';
require_once 'Models/Connection.php';
require_once 'Models/PostManager.php';

require_once 'Models/Utils.php';

class Controller extends Page
{
    protected $admin;
    protected $commentsManager;
    protected $connection;
    protected $page;
    protected $postManager;

    public function __construct(string $method = 'index')
    {
        session_start();
        $this->admin = new Admin();
        $this->commentsManager = new CommentsManager();
        $this->connection = new Connection();
        $this->postManager = new PostManager();
        $this->$method();
        
    }

    /**
     * Built the index page by default
     */
    public function index()
    { 
        $this->template('Frontend/home');
    }

    /**
     * Built the page of Alaska book
     */
    public function alaska()
    {
        if ( !isset($_GET['post']) ){
            $data = $this->postManager->readAllPost();
            $this->template('Frontend/alaskaList', $data);

        } elseif ( !is_numeric($_GET['post']) ){
            $this->template('Errors/404');

        } else {
            $data = $this->postManager->read($_GET['post']);

            if ( $data === FALSE ){
                $this->template('Errors/404');
            } else {
                $this->template('Frontend/alaskaPost', $data);
            }
        }
    }

    /**
     * Built the Admin page
     */
    public function admin()
    {
        if( $this->connection->isAdmin() ){ // If True
            $data = $this->commentsManager->reportCount();
            $this->template('Backend/admin', $data);
        } else {
            $this->template('Frontend/connection');
        }
    }

    /**
     *  Check that connection to the Admin page is allowed
     */
    public function connection()
    {
        if ( Utils::checkRequest($_POST, ['user', 'password']) ) { // If True
            $user     = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $this->admin( $this->connection->verifyAccount($user, $password) );

        } else {
            $this->admin();
        }
    }

    /**
     * Destroy $_SESSION
     * @return Void
     */
    public function signOut()
    {
        session_destroy();
        $this->index();
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
            $this->template('Errors/404');
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
            $this->template('Errors/404');
        }
        
    }
}