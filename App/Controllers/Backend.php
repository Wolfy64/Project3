<?php

require_once '../Controllers/Page.php';

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

        $data = ['reportCount'  => $this->commentsManager->reportCount(),
                 'commentCount' => $this->commentsManager->commentCount(),
                 'postCount'    => $this->postManager->postCount()
                ];

        $this->template('Backend/home', $data);
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

    /**
     * Built the admin showReport page
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "managePost"
     * @return Void
     */
    public function managePost()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'managePost' ) {
            $this->template('Errors/404');

        } else {
            $data = $this->postManager->readAllPost();
            $this->template('Backend/managePost', $data);           
        }
    }

    /**
     * Built the admin newPost page
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "newPost"
     * @return Void
     */
    public function newPost(array $data = NULL)
    {
        $route = $this->router->getRoute();

        if ( $route[1] != ('newPost' || 'updatePost') ) {
            $this->template('Errors/404');

        } else {
            $this->template('Backend/newPost', $data);           
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

    /**
     * Update published post
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "updatePost" 
     *   $route[2] = idPost => Integer
     * @return Void
     */
    public function updatePost()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'updatePost' ){
            $this->template('Errors/404');

        } else {
            $idPost = intval( $route[2] );
            $post = $this->postManager->readPost($idPost);

            $this->newPost($post);       
        }
    }

    /**
     * Delete a published post
     *   $route[0] = Page   => "admin"
     *   $route[1] = Action => "deletePost" 
     *   $route[2] = idPost => Integer
     * @return Void
     */
    public function deletePost()
    {
        $route = $this->router->getRoute();

        if ( $route[1] != 'deletePost' ){
            $this->template('Errors/404');

        } else {
            $idComment = intval( $route[2] );
            $this->postManager->delete($idComment);

            $data = $this->postManager->readAllPost();
            $this->template('Backend/managePost', $data);          
        }
    }

    /**
     * Add a new post
     * @return Void
     */
    public function addPost()
    {
        $toCheck = ['title','author', 'contents'];

        if ( Utils::checkArray($_POST, $toCheck) ){

            $this->postManager->create( $post = new Post($_POST) );
            $this->template('Backend/home');

        } else {
            $this->template('Errors/404');
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