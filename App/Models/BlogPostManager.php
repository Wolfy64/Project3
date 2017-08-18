<?php

require_once 'SQLRequest.php';

/**
 *
 *
 */
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
     *
     *
     */
    public function read($id)
    {
        $sql = 'SELECT * FROM blogAlaska WHERE id = :id';
        $param = true;
        $dbh = $this->executeRequest($sql, $param);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();

        return $dbh->fetch(PDO::FETCH_ASSOC);
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

    public function readAllPost()
    {
        $sql = 'SELECT * FROM blogAlaska';
        $dbh = $this->executeRequest($sql);

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
}
