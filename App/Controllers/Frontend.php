<?php

require_once 'Controllers/Page.php';

require_once 'Models/Connection.php';
require_once 'Models/PostManager.php';
require_once 'Models/Utils.php';

class Frontend extends Page
{
    protected $connection;
    protected $postManager;

    public function __construct(Router $router, $page)
    {
        $this->connection = new Connection();
        $this->postManager = new PostManager();
        parent::__construct($router, $page);
    }

    // PAGES

    /**
     * Built the page of Alaska book
     */
    public function alaska()
    {
        $route = $this->router->getRoute();

        if ( next($route) != 'post' ){
            $data = $this->postManager->readAllPost();

            return $this->template('Frontend/alaskaList', $data);

        } elseif( !is_numeric( next($route) ) ) {

            return $this->template('Errors/404');

        } else {
            $data = $this->postManager->read( current($route) );

            if ( $data === FALSE ){
                return $this->template('Errors/404');

            } else {
                return $this->template('Frontend/alaskaPost', $data);
            }        
        }
    }

    /**
     * Check that connection to the Admin page is allowed
     */
    public function connection()
    {
        if ( Utils::checkArray($_POST, ['user', 'password']) ) { // If True
            $user     = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);
            
            $this->connection->verifyAccount($user, $password);
        } 

        return $this->isAdmin();
    
    }

    /**
     * @param array from $_POST
     */
    public function addComment()
    {
        if ( Utils::checkArray($_POST['comment'], ['idBlogAlaska', 'author', 'contents']) ){

            $data = [];
            foreach ($_POST['comment'] as $key => $value) {
                $data += [$key => htmlspecialchars($value)];
            }

            $this->commentsManager->create( $comment = new Comments($data) );

            return header('Location: /alaska/post/' . $data['idBlogAlaska']);

        } else {
            $this->template('Errors/404');
        }
    }

    /**
     * Report Comments
     * @return Void
     */
    public function report()
    {
        if ( Utils::checkArray($_POST, ['report', 'idBlogAlaska']) ){
            $idComment = intval($_POST['report']);
            $idPost    = intval($_POST['idBlogAlaska']);

            $this->commentsManager->report($idComment);
            header('Location: /alaska?post=' . $idPost);
  
        } else {
            $this->template('Errors/404');
        }
        
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {

        if ( !isset($_SESSION['admin']) || $_SESSION['admin'] != TRUE ){

            return $this->template('Frontend/connection');

        } else {

            return header("Location: /admin/home");

        }

    }
}

