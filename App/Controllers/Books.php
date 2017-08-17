<?php

class Books
{
    public function __construct()
    {
        $this->loadAction();
    }

    public function loadAction()
    {
        if ( isset($_GET['action']) ){
            $action = htmlspecialchars($_GET['action']);
        } else {
            $action = null;
        }

        switch ($action) {
            case 'alaska':
                header('Location: alaska');
                break;
            
            default:
                header('Location: index.php');
                break;
        }
    }
}