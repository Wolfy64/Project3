<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';

class Home extends Page
{
    protected $blogPostManager;

    public function __construct()
    {
        echo 'This is the ' . __CLASS__ . ' page';
        $this->blogPostManager = new BlogPostManager();
        parent::__construct();

    }

    public function contents()
    {
        $dbh = $this->blogPostManager->readAll(); // Database Handle
        $contents = $dbh->fetchAll(PDO::FETCH_ASSOC);
        // while($contents = $dbh->fetch(PDO::FETCH_ASSOC)){
        //     // $posts[] = new BlogPost($data);
        //     echo 'To ';
        // }
        return $contents;
    }

    public function test()
    {
        $toto = 'Ceci est un test';
        return $toto;
    }   
}