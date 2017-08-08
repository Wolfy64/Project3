<?php $this->title = 'Mon Blog - ' . $title ?>

<article>
    <h1> <?= $this->title ?> </h1>
    <?= $contents ?>
    <time> <?= $post['dateContents'] ?> </time>
    <p> <?= $post['contents'] ?> </p>
</article>
<hr>
<h1>Réponse à <?= $post['title'] ?></h1>
<?php foreach ( $comments as $comment ): ?>
    <p> <?= $comment['author'] ?></p>
    <p> <?= $comment['contents'] ?></p>
<?php endforeach; ?>
