<?php

require_once 'Controllers/Controller.php';

try{
    if ( isset($_GET['action']) ){
        if ( $_GET['action'] == 'post' ){
            if ( $_GET['id'] ){
                $idPost = intval($_GET['id']);
                if ( $idPost != 0 ){
                    post($idPost);
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
        home();  // action par défaut
    }
}catch ( Exception $e){
    error($e->getMessage());
}

//     require_once('Models/Model.php');
// try{
//     $blogPostList = getPostList();
//     require_once('Views/Template/home.php');
// } catch (Exception $e){
//     $msgError = $e->getMessage();
//     require_once('Views/Template/error.php');
// }



// if ( isset($_GET['controller']) && isset($_GET['action']) ){
//     $controller = htmlspecialchars($_GET['controller']);
//     // $action = htmlspecialchars($_GET['action']);
// } else{
//     $controller = 'home';
//     // $action = 'home';
// }

// switch ($controller) {
//     case 'home':
//         require_once('Controllers/homeController.php');
//         break;

//     case 'admin':
//         require_once('Controllers/admin.php');
//         break;
    
//     default:
//         require_once('Views/404.php');
//         break;
// }