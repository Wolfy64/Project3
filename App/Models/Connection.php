<?php

include_once 'SQLRequest.php';
include_once 'Controllers/Controller.php';

class Connection extends SQLRequest
{
    public function verifyPassword()
    {
        if ( isset($_POST['user']) && isset($_POST['password']) ){
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);

            if ( $this->readUser($user) === TRUE && $this->readPassword($password) === TRUE){
                echo 'tu es connecté';
            } else {
                echo 'user ou mdp incorrect';
            }
        } else {
            echo 'ERREUR';
        }
    }

    /**
     * Check if user exist in database
     * @param $user string
     * @return bool
     */
    public function readUser(string $user)
    {
        $sql = 'SELECT user FROM usersBlog WHERE user = :user';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':user', $user, PDO::PARAM_STR);
        $dbh->execute();

        return $dbh->rowCount() === 1;
    }

    /**
     * Check if password exist in database
     * @param $passwor string
     * @return bool
     */
    public function readPassword(string $password)
    {
        $sql = 'SELECT password FROM usersBlog WHERE password = :password';
        $dbh = $this->executeRequest($sql, TRUE);
        $dbh->bindParam(':password', $password, PDO::PARAM_STR);
        $dbh->execute();

        return $dbh->rowCount() === 1;
    }

}