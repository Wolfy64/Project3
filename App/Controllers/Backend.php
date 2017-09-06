<?php

require_once 'Controllers/Page.php';
require_once 'Models/Comments.php';
require_once 'Models/Connection.php';

class Backend extends Page
{
    protected $connection;
    protected $commentsManager;

    public function __construct(Router $router, $page)
    {
        $this->commentsManager = new CommentsManager;
        $this->connection = new Connection();
        parent::__construct($router, $page);
    }

    // PAGES

    /**
     * Built the admin page
     */
    public function home()
    {
        if ( $_SESSION['admin'] != True ){
            return $this->template('Frontend/connection');
        } else {
            $data = $this->commentsManager->reportCount();

            return $this->template('Backend/admin', $data);
        }
    }

    public function showReport()
    {
        $route = $this->router->getRoute();

        if ( next($route) != 'showReport' ) {

            return $this->template('Errors/404');
        } else {
            $data = $this->commentsManager->showReport();

            return $this->template('Backend/showReport', $data);           
        }
    }
    
    /**
     * Cancel comments reports 
     * @return Void
     */
    public function cancelReport()
    {
        $route = $this->router->getRoute();
        
        if ( next($route) != 'cancelReport' ){
            
            return $this->template('Errors/404');
        } else {

            $idComment = intval( next($route) );
            $this->commentsManager->cancelReport($idComment);
            $data = $this->commentsManager->showReport();
            
            return $this->template('Backend/showReport', $data);          
        }
    }

    public function deleteReport()
    {
        $route = $this->router->getRoute();

        if ( next($route) != 'deleteReport' ){
            
            return $this->template('Errors/404');
        } else {

            $idComment = intval( next($route) );
            $this->commentsManager->delete($idComment);
            $data = $this->commentsManager->showReport();

            return $this->template('Backend/showReport', $data);          
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
}