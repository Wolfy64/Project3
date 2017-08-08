<?php $this->title = 'Mon Blog - '?>

<article>
    <h1> <?= $post['title'] ?> </h1>
    <time> <?= $post['dateContents'] ?> </time>
    <p> <?= $post['contents'] ?> </p>
</article>
<hr>
<h1>Réponse à <?= $post['title'] ?></h1>
<?php foreach ( $comments as $comment ): ?>
    <p> <?= $comment['author'] ?></p>
    <p> <?= $comment['contents'] ?></p>
<?php endforeach; ?>


<?php require_once('layout.php'); ?>