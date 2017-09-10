<?php

require_once '../Models/CommentManager.php';
require_once '../Models/Data.php';

class Post extends Data
{
    protected $commentList;
    protected $commentManager;

    public function __construct($data)
    { 
        parent::__construct($data);
        $this->commentManager = new CommentManager();
        $this->setCommentList(); 
    }    

    // GETTERS

    public function getCommentList(){ return $this->commentList;}

    // SETTERS

    public function setCommentList()
    {
        if ( $this->id != null ){
            $this->commentList = $this->commentManager->read($this->id);
        }
    }

    /**
     * Read a summary of $contents by default 100 characters
     * @param integer $length by default 100
     * @return $content
     */
    public function readSummary(int $length = 100)
    {
        $contents = htmlentities( $this->contents );
        if ( strlen($contents) >= $length ){
            $pos = strpos($contents, ' ', $length); // For not to cut a word
            return substr($contents, 0, $pos) . ' ...';
        } else {
            return $contents;
        }
    }
}