<?php

require_once 'Models/BlogPost.php';
require_once 'Models/BlogComments.php';
require_once 'Views/Template/View.php';

class ControllerBlogPost
{
    private $blogPost;
    private $blogComments;

    public function __construct()
    {
        $this->blogPost = new BlogPost();
        $this->blogComments = new BlogComments();
    }
    
    // Affiche les détails sur un billet
    function post($idPost) {
        $blogPost = $this->blogPost->getPost($idPost);
        $blogComments = $this->blogComments->getComments($idPost);
        $view = new View('post');
        $view->generate( array( 'blogPost' => $blogPost, 'blogComments' => $blogComments ) );
    } 
}

