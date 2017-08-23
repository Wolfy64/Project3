<?php

include_once 'SQLRequest.php';

class Connection extends SQLRequest
{
    /**
     * Check if user and password are correct
     * @return bool
     */
    public function verifyAccount(string $user, string $password)
    {
        $userId =     $this->dbUser($user);
        $dbPassword = $this->dbPassword($userId, $password);

        return password_verify($password, $dbPassword);
    }

    /**
     * Check if user exist in database
     * @param $user string
     * @return $userId or FALSE;
     */
    public function dbUser(string $user)
    {
        $sql = 'SELECT id, user FROM usersBlog WHERE user = :user';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':user', $user, PDO::PARAM_STR);
        $dbh->execute();

        return $dbh->fetchColumn(0);
    }

    /**
     * If user exist read password in database
     * @param $password string
     * @return $password or FALSE
     */
    public function dbPassword($userId, string $password) // Pourquoi le type mixed ne marche pas pour $userId ?
    {
        if ( $userId != FALSE ){
            $sql = 'SELECT password FROM usersBlog WHERE id = :id';
            $dbh = $this->executeRequest($sql, TRUE);
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
        $dbh = $this->executeRequest($sql);
        // A finir pour creer ou modifier le mdp de l'écrivain;
    }
}
