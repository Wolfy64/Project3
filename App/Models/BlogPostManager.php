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
        $sql = 'SELECT contents FROM blogAlaska WHERE id = :id';


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

    public  function count()
    {
        return $this->db->query('SELECT COUNT(*) FROM Blog')->fetchColumn();
    }

    public function readAll()
    {
        $sql = 'SELECT * FROM blogAlaska';
        return $this->executeRequest($sql);
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
