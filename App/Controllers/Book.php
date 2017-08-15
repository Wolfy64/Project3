<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';

class Book extends Page
{
    protected $blogPostManager;

    public function __construct($body ='Views/book.php')
    {
        echo 'This is the ' . __CLASS__ . ' page';
        $this->blogPostManager = new BlogPostManager();
        parent::__construct('Views/book.php');
        $this->view();
    }

    public function view()
    {
        $post = [];
        $dbh = $this->blogPostManager->readAll(); // Database Handle
        while ($posts = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $post[] = $posts['title'];
        }
        var_dump($post);
        return $post;
    }
}