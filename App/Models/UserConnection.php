<?php

include_once '../Models/SQLRequest.php';

class UserConnection extends SQLRequest
{
    /**
     * Check if user and password are correct
     * @return bool
     */
    public function verifyAccount(string $user, string $password)
    {
        $userId     = $this->dbUser($user);
        $dbPassword = $this->dbPassword($userId, $password);

        if ( password_verify($password, $dbPassword) ){
            $this->setAdmin();
        } else {
            return FALSE;
        }

    }

    /**
     * Check if user exist in database
     * @param $user string
     * @return $userId or FALSE;
     */
    private function dbUser(string $user)
    {
        $sql = 'SELECT id, user FROM usersBlog WHERE user = :user';
        $dbh = $this->getDatabase()->prepare($sql);
        $dbh->bindParam(':user', $user, PDO::PARAM_STR);
        $dbh->execute();

        return $dbh->fetchColumn(0);
    }

    /**
     * If user exist read password in database
     * @param $password string
     * @return $password or FALSE
     */
    private function dbPassword($userId, string $password)
    {
        if ( $userId != FALSE ){
            $sql = 'SELECT password FROM usersBlog WHERE id = :id';
            $dbh = $this->getDatabase()->prepare($sql);
            $dbh->bindParam(':id', $userId, PDO::PARAM_INT);
            $dbh->execute();

            return $dbh->fetchColumn(0);

        } else {
            return FALSE;
        }
    }

    /**
     * Creates a password hash in database
     * @param $password
     */
    public function passHach(string $password)
    {
        $passwordHach = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12 ]);
        $sql = 'INSERT INTO password FROM userBlog';
        $dbh = $this->getDatabase()->prepare($sql);
        // A finir pour creer ou modifier le mdp de l'écrivain;
    }

    /**
     * Set Admin = TRUE
     * @return Void
     */
    private function setAdmin()
    {
        $_SESSION['admin'] = TRUE;
    }
}