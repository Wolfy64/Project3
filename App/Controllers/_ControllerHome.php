<?php

require_once 'Models/BlogPost.php';
require_once 'Views/Template/View.php';

class ControllerHome
{
    private $blogPostList;

    public function __construct()
    {
        $this->blogPostList = new BlogPost;
    }

    // Affiche la liste de tous les billets du blog
    public function home()
    {
        $blogPostList = $this->blogPostList->getPostList();
        $view = new View('home');
        $view->generate( array( 'blogPostList' => $blogPostList ) );
    }
}