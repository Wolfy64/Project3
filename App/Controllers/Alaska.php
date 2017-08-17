<?php

require_once 'Models/Page.php';
require_once 'Models/BlogPostManager.php';


class Alaska extends Page
{
    protected $blogPostManager;

    public function __construct($body ='Views/book.php')
    {
        $this->blogPostManager = new BlogPostManager();
        $this->loadAction();
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

    /**
     * Change the default date format
     * @param string $date
     * @param string $format default = 'd-m-Y'
     * @return string
     */
    public function dateFormat($date, $format = 'd-m-Y')
    {
        $originalDate = $date;
        return date($format, strtotime($originalDate));
    }

    public function loadAction()
    {
        if ( isset($_GET['post']) ){
            echo ' charge l\'action page';
            include 'Views/bookPost.php';
        } else {
            echo ' Ne charge RIEN';
            parent::__construct('Views/book.php');
        }
    }

}