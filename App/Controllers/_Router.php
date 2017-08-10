<?php

require_once 'Controllers/ControllerBlogPost.php';
require_once 'Controllers/ControllerHome.php';
require_once 'Views/Template/View.php';

class Router
{
    private $controllerHome;
    private $controllerBlogPost;

    public function __construct()
    {
        $this->controllerHome = new ControllerHome();
        $this->controllerBlogPost = new ControllerBlogPost();
    }

    // Traite une requête entrante
    public function routerRequest()
    {
        try{
            if ( isset($_GET['action']) ){
                if ( $_GET['action'] == 'post' ){
                    if ( $_GET['id'] ){
                        $idPost = intval($_GET['id']);
                        if ( $idPost != 0 ){
                            $this->controllerBlogPost->post($idPost);
                        }else {
                            throw new Exception("Identifiant de billet non valide");
                        }
                    }else{
                        throw new Exception("Identifiant de billet non défini");
                    }
                }else{
                    throw new Exception("Action non valide");
                }
            }else {
                $this->controllerHome->home();  // action par défaut
            }
        }catch ( Exception $e){
            $this->error($e->getMessage());
        }
        
    }

    // Affiche une erreur
    public function error($msgError) {
        var_dump($msgError);
        $view = new View('error');
        $view->generate( array( 'msgError' => $msgError ) );
    }
}