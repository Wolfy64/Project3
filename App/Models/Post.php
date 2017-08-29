<?php

require_once 'Models/CommentsManager.php';
require_once 'Models/Data.php';

class Post extends Data
{
    protected $commentsList;
    protected $commentsManager;

    public function __construct($data)
    { 
        parent::__construct($data);
        $this->commentsManager = new CommentsManager();
        $this->setCommentsList(); 
    }    

    // GETTERS

    public function getCommentsList(){ return $this->commentsList;}

    // SETTERS

    public function setCommentsList()
    {
        $this->commentsList = $this->commentsManager->read($this->id);
    }

    /**
     * Read a summary of $contents by default 100 characters
     * @param integer $length by default 100
     * @return $content
     */
    public function readSummary(int $length = 100)
    {
        $contents = $this->contents;
        if ( strlen($contents) >= $length ){
            $pos = strpos($contents, ' ', $length); // For not to cut a word
            return substr($contents, 0, $pos) . ' ...';
        } else {
            return $contents;
        }
    }
}