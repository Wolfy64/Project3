<?php

require_once '../Models/Comments.php';
require_once '../Models/SQLRequest.php';

class CommentsManager extends SQLRequest
{

    // CRUD SYSTEM

    /**
     * @param Object $data
     * @return Void
     */
    public function create(Comments $data)
    {
        $author = $data->getAuthor();
        $contents = $data->getContents();
        $idBlogAlaska = $data->getIdBlogAlaska();

        $sql = 'INSERT INTO commentsBlogAlaska(author, contents, dateContents, idBlogAlaska)
                VALUES(:author, :contents, NOW(), :idBlogAlaska)';

        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':author', $author, PDO::PARAM_STR);
        $dbh->bindParam(':contents', $contents, PDO::PARAM_STR);
        $dbh->bindParam(':idBlogAlaska', $idBlogAlaska, PDO::PARAM_INT);

        $dbh->execute();
    }

    /**
     * Read all comments from $postId
     * @param int $postId
     * @return array Object Comment
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

    public function update()
    {
        
    }

    public function delete(int $idComment)
    {
        $sql = 'DELETE FROM commentsBlogAlaska WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }

    // OTHERS METHODS

    /**
     * Report comments
     * @param int $idComment
     * @return Void
     */
    public function report(int $idComment)
    {
        $sql = 'UPDATE commentsBlogAlaska SET report = True WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }

    /**
     * Count numbers of report
     * @return int
     */
    public function reportCount()
    {
        $sql = 'SELECT COUNT(*) FROM commentsBlogAlaska WHERE report = True';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->execute();
        $result = intval($dbh->fetchColumn());

        return $result;
    }

    /**
     * @param void
     * @return array Object Comments
     */
    public function showReport()
    {
        $reportList = [];
        $sql = 'SELECT id, author, contents, dateContents FROM commentsBlogAlaska WHERE report = True';
        $dbh = $this->getDatabase()->query($sql);
        $data = $dbh->fetchAll(PDO::FETCH_ASSOC);

        foreach ( $data as $report ) {
            $reportList[] = new Comments($report);
        }
        
        return $reportList;
    }

    /**
     * Remove report comments
     * @param int $idComment
     * @return Void
     */
    public function cancelReport(int $idComment)
    {
        $sql = 'UPDATE commentsBlogAlaska SET report = FALSE WHERE id = :id';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':id', $idComment, PDO::PARAM_INT);
        $dbh->execute();
    }
}