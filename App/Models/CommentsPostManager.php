<?php

require_once 'Models/SQLRequest.php';

class CommentsPostManager extends SQLRequest
{
    /**
     *
     *
     */
    public function read(int $postId)
    {
        $sql = 'SELECT *
                FROM blogAlaska
                INNER JOIN commentsBlogAlaska
                ON commentsBlogAlaska.idBlogAlaska = blogAlaska.id
                WHERE blogAlaska.id = :id';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':id', $postId, PDO::PARAM_INT);
        $dbh->execute();

        return $dbh->fetchAll(PDO::FETCH_ASSOC);
    }
}