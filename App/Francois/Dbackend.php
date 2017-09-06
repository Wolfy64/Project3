<?php

require_once 'Controllers/Page.php';

class Backend extends Page
{
    protected $controlers;

    public function __construct()
    {
        $this->controlers = array(
            '' => $this->posts, 
            'posts'  => $this->posts,
            'comments'  => $this->comments
        );
    }

    /**
     * Built the index page by default
     */
    public function index()
    { 
        //grosse redirection vers listing
    }

    /**
     * Admin listing
     */
    public function posts(array $parameters) // /admin  et aussi /admin/listing
    {
       // listing posts
    }

    public function comments(array $parameters) // /admin/comments 
    {
       // listing comments
    }

    public function hasAndRegisterSubControler($sub_controler)
    {
        if (array_key_exists($this->subControler, $this->controlers)) {
            $this->subControler = $sub_controler;
            return true;
        }

        return false;
    }

    public function execute($params)
    {
        if (array_key_exists($this->subControler, $this->controlers)) {
            $this->error404($params);
            return;
        }
        
        $this->controlers[$this->subControler]();
    }






















    /**
     * Built the Admin page
     */
    public function admin()
    {
        if( $this->connection->isAdmin() ){ // If True
            $this->adminPage();
        } else {
            $this->template('Frontend/connection');
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

        if ( Utils::checkArray($_POST['comment'], ['idBlogAlaska', 'author', 'contents']) ){

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
     * Cancel comments reports 
     * @return Void
     */
    public function cancelReport()
    {
        if ( Utils::checkArray($_GET[], ['cancel']) ){
            $idComment = intval($_POST['cancel']);

            $this->commentsManager->cancelReport($idComment);
            // header('Location: /alaska?post=' . $idPost);
  
        } else {
            $this->template('Errors/404');
        }
        
    }

    /**
     * Built the admin page
     */
    private function adminPage()
    {
        if ( isset($_SESSION['admin']) === TRUE ){

            if ( isset($_GET['page']) ){
                $action = htmlspecialchars($_GET['page']);

                switch ($action) {
                    case 'new':
                        $this->template('Backend/new');
                        break;

                    case 'posts':
                        $data = $this->postManager->readAllPost();
                        $this->template('Backend/posts', $data);
                        break;

                    case 'report':
                        $data = $this->commentsManager->showReport();
                        $this->template('Backend/report', $data);
                        break;
                    
                    default:
                        $this->template('Errors/404');
                        break;
                }

            } else {
                $data = $this->commentsManager->reportCount();
                $this->template('Backend/admin', $data);
            }
        }
    }
}

