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
</div>

<!-- Show Comments -->

    <?php foreach ($post->getCommentsList() as $comment) { ?>

<div>
    <p><?= $comment->getTitle() ?></p>
    <p><?= $comment->getDateContents() ?></p>
    <p><?= $comment->getAuthor() ?></p>
    <p><?= $comment->getContents() ?></p>
</div>

    <?php } ?>