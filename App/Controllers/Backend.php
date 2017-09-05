<?php

require_once 'Controllers/Page.php';
require_once 'Models/Comments.php';
require_once 'Models/Connection.php';

class Backend extends Page
{
    protected $connection;
    protected $commentsManager;

    public function __construct($page)
    {
        $this->commentsManager = new CommentsManager;
        $this->connection = new Connection();
        parent::__construct($page);

    }


    /**
     * Built the admin page
     */
    private function adminPage()
    {
        if ( isset($_SESSION['admin']) === TRUE ){

            if ( isset($_GET['page']) ){
                $action = htmlspecialchars($_GET['page']);

                switch ($action) {
                    case 'new':
                        $this->template('Backend/new');
                        break;

                    case 'posts':
                        $data = $this->postManager->readAllPost();
                        $this->template('Backend/posts', $data);
                        break;

                    case 'report':
                        $data = $this->commentsManager->showReport();
                        $this->template('Backend/report', $data);
                        break;
                    
                    default:
                        $this->template('Errors/404');
                        break;
                }

            } else {
                $data = $this->commentsManager->reportCount();
                var_dump($data);
                $this->template('Backend/admin', $data);
            }
        }
    }

    /**
     * Cancel comments reports 
     * @return Void
     */
    public function cancelReport()
    {
        if ( Utils::checkArray($_GET[], ['cancel']) ){
            $idComment = intval($_POST['cancel']);

            $this->commentsManager->cancelReport($idComment);
            // header('Location: /alaska?post=' . $idPost);
  
        } else {
            $this->template('Errors/404');
        }
        
    }

    /**
     * Destroy $_SESSION
     * @return Void
     */
    public function signOut()
    {
        session_destroy();
        $this->index();
    }
}