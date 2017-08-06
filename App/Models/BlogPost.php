<?php

class BlogPost
{
    protected $id;
    protected $author;
    protected $title;
    protected $post;
    protected $datePost;
    protected $book;

    protected $error = [];

    // public function __construct(){ $this->hydrate($data); }

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

    public function setPost(String $post)
    {
        $post = htmlspecialchars($post);
        $this->post = $post;
    }

    public function setDatePost(Date $DatePost)
    {

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