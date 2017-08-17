<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';

class Book extends Page
{
    protected $blogPostManager;

    public function __construct($body ='Views/book.php')
    {
        $this->blogPostManager = new BlogPostManager();
        parent::__construct('Views/book.php');
    }

    public function view()
    {
        $dbh = $this->blogPostManager->readAll(); // Database Handle
        return $dbh->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Read a summary of $contents by default 100 characters
     * @param string $contents
     * @param integer $length
     * @return $content
     */
    public function readSummary($contents, $length = 100)
    {
        if ( strlen($contents) >= $length ){
            $pos = strpos($contents, ' ', $length); // For not to cut a word
            return substr($contents, 0, $pos) . ' ...';
        } else {
            return $contents;
        }
    }

    public function dateFormat($date)
    {
        $originalDate = $date;
        return date("d-m-Y", strtotime($originalDate));
    }

}