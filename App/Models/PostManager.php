<?php

require_once '../Models/Post.php';
require_once '../Models/SQLRequest.php';

class PostManager extends SQLRequest
{

    // CRUD SYSTEM

    /**
     * @param array $data
     * @return void
     */
    public function create(Post $data)
    {
        $title    = $data->getTitle();
        $author   = $data->getAuthor();
        $contents = $data->getContents();

        $sql = 'INSERT INTO blogAlaska(title, author, contents, dateContents)
                VALUES(:title, :author, :contents, NOW() )';

        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':title', $title, PDO::PARAM_STR);
        $dbh->bindParam(':author', $author, PDO::PARAM_STR);
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);

        $dbh->execute();
    }

    /**
     * @param $id
     * @return object Post
     */
    public function read(int $id)
    {
        $sql = 'SELECT id, author, title, contents FROM blogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();
        $data = $dbh->fetch(PDO::FETCH_ASSOC);

        if ( $data != FALSE){
            return new Post($data);
        } else {
            return FALSE;
        }
    }

    /**
     *
     *
     */
    public function update(Post $data)
    {
        $idPost   = $data->getId();
        $title    = $data->getTitle();
        $author   = $data->getAuthor();
        $contents = $data->getContents();        

        $sql = 'UPDATE blogAlaska SET title = :title, author = :author, contents = :contents WHERE idPost = :idPost';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':idPost', $idPost, PDO::PARAM_INT);
        $dbh->bindParam(':title', $title, PDO::PARAM_STR);
        $dbh->bindParam(':author', $author, PDO::PARAM_STR);
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);
        
        $dbh->execute();
    }

    /**
     *
     *
     */
    public function delete(int $idComment)
    {
        $sql = 'DELETE FROM blogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();        
    }

    // OTHERS METHODS

    /**
     * @param void
     * @return array Object Post
     */
    public function readAllPost()
    {
        $postList = [];
        $sql  = 'SELECT * FROM blogAlaska';
        $dbh  = $this->getDatabase()->query($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $post ) {
            $postList[] = new Post($post);
        }

        return $postList;
    }

    /**
     * @param $id
     * @return array
     */
    public function readPost(int $id)
    {
        $sql = 'SELECT id, author, title, contents FROM blogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();

        return $dbh->fetch(PDO::FETCH_ASSOC);
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

    /**
     * Count numbers of post
     * @return int
     */
    public function postCount()
    {
        $sql = 'SELECT COUNT(*) FROM blogAlaska';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->execute();
        $result = intval($dbh->fetchColumn());

        return $result;
    }
}