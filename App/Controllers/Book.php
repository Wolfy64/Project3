<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';

class Book extends Page
{
    protected $blogPostManager;

    public function __construct()
    {
        echo 'This is the ' . __CLASS__ . ' page';
        $this->blogPostManager = new BlogPostManager();
        parent::__construct();
    }

    public function view()
    {
        $dbh = $this->blogPostManager->readAll(); // Database Handle
        while ($blogPostList = $dbh->fetch(PDO::FETCH_ASSOC)) {
            echo '<p>' . $blogPostList['title']        . '</p>';
            echo '<p>' . $blogPostList['author']       . '</p>';
            echo '<p>' . $blogPostList['dateContents'] . '</p>';
            echo '<p>' . $blogPostList['contents']     . '</p>';
        }
    }
}