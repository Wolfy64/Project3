<?php

require_once '../Controllers/Page.php';
require_once '../Models/Comments.php';
require_once '../Models/UserConnection.php';


class Backend extends Page
{
    public function __construct(Router $router, string $methodName)
    {
        parent::__construct($router, $methodName);
        $this->connectAdmin($methodName);
    }

    // METHODS PAGES

    /**
     * Built the admin home page
     */
    public function home()
    {
        $data = $this->commentsManager->reportCount();
        $this->template('Backend/admin', $data);
    }

    /**
     * Built the admin showReport page
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "showReport"
     * @return Void
     */
    public function showReport()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'showReport' ) {
            $this->template('Errors/404');

        } else {
            $data = $this->commentsManager->showReport();
            $this->template('Backend/showReport', $data);           
        }
    }

    public function newPost()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'newPost' ) {
            $this->template('Errors/404');

        } else {
            // $data = $this->commentsManager->showReport();
            $this->template('Backend/newPost');           
        }
    }

    // METHODS ACTIONS
    
    /**
     * Cancel comments reports
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "cancelReport" 
     *   $route[2] = idPost => Integer
     * @return Void
     */
    public function cancelReport()
    {
        $route = $this->router->getRoute();
        
        if ( $route[1] != 'cancelReport' ){
            $this->template('Errors/404');

        } else {
            $idComment = intval( $route[2]  );
            $this->commentsManager->cancelReport($idComment);

            $data = $this->commentsManager->showReport();
            $this->template('Backend/showReport', $data);          
        }
    }

    /**
     * Delete comments reports
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "deleteReport" 
     *   $route[2] = idPost => Integer
     * @return Void
     */
    public function deleteReport()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'deleteReport' ){
            $this->template('Errors/404');

        } else {
            $idComment = intval( $route[2] );
            $this->commentsManager->delete($idComment);

            $data = $this->commentsManager->showReport();
            $this->template('Backend/showReport', $data);          
        }
    }

    // METHODS CONNECTION ADMIN

    /**
     * Check that connection to the Admin page is allowed
     */
    public function signIn()
    {
        $toCheck = ['user', 'password'];

        if ( Utils::checkArray($_POST, $toCheck) ) { // If TRUE
            $user     = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);

            $this->userConnection->verifyAccount($user, $password);

            if ( $this->isAdmin() ){ // If TRUE
                $this->home();
            }else {
                $this->template('Backend/signIn');
            }

        } else {

            $this->template('Backend/signIn');
        }
    }

    /**
     * Destroy $_SESSION
     * @return Void
     */
    public function signOut()
    {
        session_destroy();
        $this->template('Frontend/home');
    }

    /**
     * Manage if user can acces to Admin section
     * @param string $methodName
     * @return Void
     */
    private function connectAdmin(string $methodName)
    {
        if ( $this->isAdmin() != TRUE && $methodName === 'signIn' ){ // If NOT true AND 'signIn'
            $this->signIn();

        } elseif( $this->isAdmin() === TRUE && $methodName === 'signIn') { // If true AND 'signIn'
            $this->home();

        } elseif( $this->isAdmin() === TRUE && $methodName != 'signIn' ) { // If true AND NOT 'signIn'
            $this->$methodName();
        } else{
            $this->signIn();
        }        
    }

    /**
     * Check if user is Admin
     * @return bool
     */
    private function isAdmin()
    {
        if ( !isset($_SESSION['admin']) || $_SESSION['admin'] != TRUE ){
            return FALSE;

        } else {
            return TRUE;
        }
    }
}