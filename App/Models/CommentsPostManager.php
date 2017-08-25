<?php

require_once 'Models/CommentsPost.php';
require_once 'Models/SQLRequest.php';

class CommentsPostManager extends SQLRequest
{
    /**
     *
     *
     */
    public function read(int $postId)
    {
        $commentsList = [];
        $sql = 'SELECT *
                FROM blogAlaska
                INNER JOIN commentsBlogAlaska
                ON commentsBlogAlaska.idBlogAlaska = blogAlaska.id
                WHERE blogAlaska.id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $postId, PDO::PARAM_INT);
        $dbh->execute();
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $post ) {
            $commentsList[] = new CommentsPost($post);
        }
        return $commentsList;
    }
}