<?php

require_once('Error.php');

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
            // ErrorTest::errorMessage(__FUNCTION__);
            throw new Exception("Error Processing Request" . $function, 1);
            die($e->getMessage());
        }
    }

    public function setAuthor($author)
    {

    }

    public function setTitle($title)
    {

    }

    public function setPost($post)
    {

    }

    public function setDatePost($DatePost)
    {

    }

    public function setBook($book)
    {

    }
}