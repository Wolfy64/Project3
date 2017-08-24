<?php

class BlogPost
{
    protected $id;
    protected $author;
    protected $title;
    protected $contents;
    protected $dateContents;

    public function __construct($data)
    { 
        $this->hydrate($data); 
    }

    public function hydrate(array $data)
    {
        foreach ( $data as $key => $value ){
            $method = 'set' . ucfirst($key);
            if ( method_exists($this, $method) ){
                 $this->$method($value);
            }
        }
    }

    // GETTERS

    public function getId(){ return $this->id; }

    public function getAuthor(){ return $this->author; }

    public function getTitle(){ return $this->title; }

    public function getContents(){ return $this->contents; }

    public function getDateContents(){ return $this->dateContents; }

    // SETTERS

    public function setId(Int $id)
    {
        if ( $id > 0 ){
            $this->id = $id;
        } else{
            throw new Exception('$id must be an integer > 0');
        }
    }

    public function setAuthor(String $author)
    {
        $author = htmlspecialchars($author);
        if ( strlen($author) <= 100 ){
            $this->author = $author;
        }else{
            throw new Exception('$author must be <= 100 character');
        }
    }

    public function setTitle(String $title)
    {
        $title = htmlspecialchars($title);
        if ( strlen($title) <= 100 ){
            $this->title = $title;
        }else{
            throw new Exception('$title must be <= 100 character');
        }
    }

    public function setContents(String $contents)
    {
        $contents = htmlspecialchars($contents);
        $this->contents = $contents;
    }

    /**
     * Change the default date format to d-m-Y
     * @param string $dateContents
     * @return string $date
     */
    public function setDateContents(String $dateContents)
    {   
        $this->dateContents = date('d-m-Y', strtotime($dateContents));
    }

    /**
     * Read a summary of $contents by default 100 characters
     * @param string $contents
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