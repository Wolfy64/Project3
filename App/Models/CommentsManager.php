<?php

require_once 'Models/Comments.php';
require_once 'Models/SQLRequest.php';

class CommentsManager extends SQLRequest
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
            $commentsList[] = new Comments($post);
        }
        return $commentsList;
    }

    public function create(Comments $data)
    {
        $author = $data->getAuthor(); // Notice: Only variables should be passed by reference...
        $contents = $data->getContents();
        $idBlogAlaska = $data->getIdBlogAlaska();

        $sql = 'INSERT INTO commentsBlogAlaska(author, contents, dateContents, idBlogAlaska)
                VALUES(:author, :contents, NOW(), :idBlogAlaska)';

        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':author', $author, PDO::PARAM_STR); // Notice: Only variables should be passed by reference...
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);
        $dbh->bindParam(':idBlogAlaska', $idBlogAlaska, PDO::PARAM_INT);

        $dbh->execute();
    }

    public function report(int $idComment)
    {
        $sql = 'UPDATE commentsBlogAlaska SET report = true WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }
}