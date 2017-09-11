<?php

require_once '../Models/Comment.php';
require_once '../Models/SQLRequest.php';

class CommentManager extends SQLRequest
{

    // CRUD SYSTEM

    /**
     * @param Object $data
     * @return Void
     */
    public function create(Comment $data)
    {
        $author = $data->getAuthor();
        $contents = $data->getContents();
        $idBlogAlaska = $data->getIdBlogAlaska();

        $sql = 'INSERT INTO commentBlogAlaska(author, contents, dateContents, idBlogAlaska)
                VALUES(:author, :contents, NOW(), :idBlogAlaska)';

        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':author', $author, PDO::PARAM_STR);
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);
        $dbh->bindParam(':idBlogAlaska', $idBlogAlaska, PDO::PARAM_INT);

        $dbh->execute();
    }

    /**
     * Read all comment from $postId
     * @param int $postId
     * @return array Object Comment
     */
    public function read(int $postId)
    {
        $commentList = [];
        $sql = 'SELECT *
                FROM blogAlaska
                INNER JOIN commentBlogAlaska
                ON commentBlogAlaska.idBlogAlaska = blogAlaska.id
                WHERE blogAlaska.id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $postId, PDO::PARAM_INT);
        $dbh->execute();
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $post ) {
            $commentList[] = new Comment($post);
        }
        return $commentList;
    }

    public function update(Comment $data)
    {
        $id   = $data->getId();
        $contents = $data->getContents();        

        $sql = 'UPDATE commentBlogAlaska SET contents = :contents WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);
        
        $dbh->execute();        
    }

    public function delete(int $idComment)
    {
        $sql = 'DELETE FROM commentBlogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }

    // OTHERS METHODS

    /**
     * Report comment
     * @param int $idComment
     * @return Void
     */
    public function report(int $idComment)
    {
        $sql = 'UPDATE commentBlogAlaska SET report = True WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }

    /**
     * Count number of reports
     * @return int
     */
    public function reportCount()
    {
        $sql = 'SELECT COUNT(*) FROM commentBlogAlaska WHERE report = TRUE';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->execute();
        $result = intval($dbh->fetchColumn());

        return $result;
    }

    /**
     * Count number of users comments
     * @return int
     */
    public function commentCount()
    {
        $sql = 'SELECT COUNT(*) FROM commentBlogAlaska';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->execute();
        $result = intval($dbh->fetchColumn());

        return $result;        
    }

    /**
     * Read all comments reported
     * @param void
     * @return array Object Comment
     */
    public function readAllReport()
    {
        $reportList = [];
        $sql = 'SELECT id, author, contents, dateContents FROM commentBlogAlaska WHERE report = True';
        $dbh = $this->getDatabase()->query($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $report ) {
            $reportList[] = new Comment($report);
        }
        
        return $reportList;
    }

    /**
     * Cancel the state "report" for a comment reported
     * @param int $idComment
     * @return Void
     */
    public function cancelReport(int $idComment)
    {
        $sql = 'UPDATE commentBlogAlaska SET report = FALSE WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }

    /**
     * Read all blog comment
     * @return array Object Comment
     */
    public function readAll()
    {
        $commentList = [];
        $sql  = 'SELECT * FROM commentBlogAlaska';
        $dbh  = $this->getDatabase()->query($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $comment ) {
            $postList[] = new Comment($comment);
        }

        return $postList;
    }

    /**
     * @param $id
     * @return array
     */
    public function readCommentToUpdate(int $id)
    {
        $sql = 'SELECT id, author, contents FROM commentBlogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $id, PDO::PARAM_INT);
        $dbh->execute();

        return $dbh->fetch(PDO::FETCH_ASSOC);       
    }
}