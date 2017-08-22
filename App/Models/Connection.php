<?php

include_once 'Controllers/Controller.php';

class Connection
{
    public static function verifyPassword()
    {
        if ( isset($_POST['user']) && isset($_POST['password']) ){
            $user = htmlspecialchars($_POST['user']);
            $password = htmlspecialchars($_POST['password']);

            if ($user === 'admin' && $password === 'root'){
                echo 'tu es connecté';
            } else {
                echo 'user ou mdp incorrect';
            }
        } else {
            echo 'ERREUR';
        }
    }
}