<?php

require 'Models/Model.php';

// Affiche la liste de tous les billets du blog
function home() {
  $blogPostList = getPostList();
  require 'Views/Template/home.php';
} 
// Affiche les détails sur un billet
function post($idPost) {
  $post = getPost($idPost);
  $comments = getComments($idPost);
  require 'Views/Template/post.php';
} 
// Affiche une erreur
function error($msgError) {
    require 'Views/Template/error.php';
}