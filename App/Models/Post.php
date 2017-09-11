<?php

require_once '../Models/CommentManager.php';
require_once '../Models/Data.php';

class Post extends Data
{
    protected $commentList;
    protected $commentManager;
    protected $title;

    public function __construct($data)
    { 
        parent::__construct($data);
        $this->commentManager = new CommentManager();
        $this->setCommentList(); 
    }    

    // GETTERS

    public function getTitle(){ return $this->title; }

    public function getCommentList(){ return $this->commentList;}

    // SETTERS

    public function setTitle(String $title)
    {
        $title = htmlspecialchars($title);
        if ( strlen($title) <= 255 ){
            $this->title = $title;
        }else{
            throw new Exception('$title must be <= 255 character');
        }
    }

    public function setCommentList()
    {
        if ( $this->id != null ){
            $this->commentList = $this->commentManager->read($this->id);
        }
    }

    // OTHER METHOD

    /**
     * Read a summary of $contents by default 100 characters
     * @param integer $length by default 100
     * @return $content
     */
    public function readSummary(int $length = 100)
    {
        $contents = strip_tags( $this->contents );

        if ( strlen($contents) >= $length ){
            $pos = strpos($contents, ' ', $length); // To avoid cuting a word
            return substr($contents, 0, $pos) . ' ...';
        } else {
            return $contents;
        }
    }
}