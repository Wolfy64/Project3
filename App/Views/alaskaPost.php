<?php
    $idPost = htmlspecialchars($_GET['post']);
    $post = $this->blogPostManager->read($idPost);
?>

<h1>Page de l'article !!!!</h1>

<div>
    <p>              <?= $post->getTitle();       ?> </p>
    <p> Published on <?= $post->getDateContents() ?> </p>
    <p>              <?= $post->getAuthor();      ?> </p>
    <p>              <?= $post->getContents();    ?> </p>
    <p><a href="#">Add Comment</a></p>
    <p>
        <form>
            
        </form>
    </p>
</div>

<?php

require_once 'Models/CommentsPostManager.php';

$comments = new CommentsPostManager();

var_dump($comments->read($idPost));

?>