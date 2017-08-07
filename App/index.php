<?php

try{
    require_once('Models/Model.php');
    $blogPost = getPost();
    require_once('Views/Template/home.php');
} catch (Exception $e){
    $msgError = $e->getMessage();
    require_once('Views/Template/error.php');
}



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