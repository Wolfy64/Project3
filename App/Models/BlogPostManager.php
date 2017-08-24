<?php

require_once 'BlogPost.php';
require_once 'SQLRequest.php';

class BlogPostManager extends SQLRequest
{

    // CRUD SYSTEM

    /**
     * @param void
     * @return void
     */
    public function create()
    {

    }

    /**
     * @param $id
     * @return array
     */
    public function read(int $id)
    {
        $sql = 'SELECT * FROM blogAlaska WHERE id = :id';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();

        return new BlogPost($dbh->fetch(PDO::FETCH_ASSOC));
    }

    /**
     *
     *
     */
    public function update()
    {

    }

    /**
     *
     *
     */
    public function delete()
    {

    }

    // METHOD

    /**
     * @param void
     * @return array
     */
    public function readAllPost()
    {
        $sql = 'SELECT * FROM blogAlaska';
        $dbh = $this->executeRequest($sql);

        return $dbh->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Read a summary of $contents by default 100 characters
     * @param string $contents
     * @param integer $length by default 100
     * @return $content
     */
    public function readSummary(string $contents, int $length = 100)
    {
        if ( strlen($contents) >= $length ){
            $pos = strpos($contents, ' ', $length); // For not to cut a word
            return substr($contents, 0, $pos) . ' ...';
        } else {
            return $contents;
        }
    }
}