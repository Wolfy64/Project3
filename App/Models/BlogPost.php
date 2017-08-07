<?php

class BlogPost
{
    protected $id;
    protected $author;
    protected $title;
    protected $postBlog;
    protected $datePost;
    protected $book;

    public function __construct($data){ $this->hydrate($data); }

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

    public function getPost(){ return $this->post; }

    public function getDatePost(){ return $this->post; }

    public function getBook(){ return $this->book; }

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

    public function setPostBlog(String $postBlog)
    {
        $postBlog = htmlspecialchars($postBlog);
        $this->postBlog = $postBlog;
    }

    public function setDatePost(String $datePost) // TO CHECK Paramater String OR Date!!!
    {
        $this->datePost = $datePost;
    }

    public function setBook(String $book)
    {
        $book = htmlspecialchars($book);
        if ( strlen($book) <= 100 ){
            $this->book = $book;
        }else{
            throw new Exception('$book must be <= 100 character');
        }
    }
}