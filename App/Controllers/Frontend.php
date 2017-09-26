<?php

require_once '../Controllers/Page.php';

class Frontend extends Page
{

    public function __construct(Router $router, string $methodName)
    {
        parent::__construct($router, $methodName);
        $this->$methodName();
    }

    // METHODS PAGES

    /**
     * Built the index page by default
     * @return Void
     */
    public function index()
    { 
        $this->template('Frontend/home');
    }

    /**
     * Built the page of Alaska book
     *   $route[0] = Page   => "postList" 
     *   $route[1] = Action => "post"
     * @return Void
     */
    public function alaska() // alaska vs postList
    {
        $route = $this->router->getRoute();

        if ( !isset($route[1]) ){ // If Action not there

            $data = $this->postManager->readAllPost();
            $this->template('Frontend/alaskaList', $data);

        } else {
            $this->post();
        }
    }

    // METHOD ACTION

    /**
     * Built the post page
     *   $route[0] = Page   => "postList"
     *   $route[1] = Action => "post"
     *   $route[2] = IdPost => Integer
     * @return Void
     */
    public function post()
    {
        $route = $this->router->getRoute();

        // IF there are 3 paramaters AND alaska/post/integer AND this post exists (true)
        if ( count($route) === 3 && $route[1] === 'post' && is_numeric($route[2]) && $this->postManager->read($route[2]) ){
            
            $data = $this->postManager->read($route[2]);
            $this->template('Frontend/alaskaPost', $data);

        } else {
            $this->template('Errors/404');
        }
    }

    // METHODS COMMENT

    /**
     * Add Comment from $_POST['comment']
     * @return Void
     */
    public function addComment()
    {
        $toCheck = ['idP3Blog', 'author', 'contents'];

        if ( Utils::checkArray($_POST['comment'], $toCheck) ){

            $data = [];
            foreach ($_POST['comment'] as $key => $value) {
                $data += [$key => htmlspecialchars($value)];
            }

            $_SESSION['message'] = 'Your comment has been added';

            $this->commentManager->create(new Comment($data) );
            header('Location: /alaska/post/' . $data['idP3Blog']);
            exit;

        } else {
            $this->template('Errors/404');
        }
    }

    /**
     * Report Comment from $_POST
     * @return Void
     */
    public function report()
    {
        $toCheck = ['report', 'idP3Blog'];

        if ( Utils::checkArray($_POST, $toCheck) ){
            $idComment = intval($_POST['report']);
            $idPost    = intval($_POST['idP3Blog']);

            $_SESSION['message'] = 'Your comment has been reported';

            $this->commentManager->report($idComment);
            header('Location: /alaska/post/' . $idPost);
            exit;

        } else {
            $this->template('Errors/404');
        }
    }
}