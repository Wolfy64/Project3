<?php

require_once 'Controllers/Page.php';
require_once 'Models/PostManager.php';
require_once 'Models/CommentsManager.php';
require_once 'Models/Connection.php';

class Controller extends Page
{
    protected $postManager;
    protected $commentsManager;
    protected $connection;
    protected $page;

    public function __construct(string $method = 'index')
    {
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
    public function admin(bool $param =  FALSE)
    {
        if( $param === TRUE ){
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
        if ( isset($_POST['user'], $_POST['password']) ){
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $this->admin($this->connection->verifyAccount($user, $password));

        } else{
            $this->template('connection');
        }
    }

    /**
     * @param array from $_POST
     */
    public function addComment()
    {
        var_dump($_POST);
        if ( isset($_POST['comment']) ){

            $data = [];
            foreach ($_POST['comment'] as $key => $value) {
                $data += [$key => htmlspecialchars($value)];
            }

            $this->commentsManager->create( $comment = new Comments($data) );
            header('Location: /alaska?post=' . $data['idBlogAlaska']);
        }
    }
}