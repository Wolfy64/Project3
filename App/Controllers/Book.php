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
    }

    public function view()
    {
        $dbh = $this->blogPostManager->readAll(); // Database Handle
        $results = $dbh->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}