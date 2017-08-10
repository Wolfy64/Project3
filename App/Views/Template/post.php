<?php $this->title = 'Mon Blog - ' . $data['blogPost']['title'] ?>

<?php 
// var_dump($data)  
?>

<?php foreach ( $data['blogPost'] as $comment ): ?>
<article>
    <h1> <?= $this->title ?> </h1>
    <time> <?= $data['blogPost']['dateContents'] ?> </time>
    <time> <?= $comment[2] ?> </time>
    <p> <?= $data['blogPost']['contents'] ?> </p>
</article>
<hr>
<h2>Réponse à <?= $data['blogPost']['title'] ?></h2>
<?php endforeach; ?>

<?php $data['blogComments'] ?>

<?php foreach ( $comments as $comment ): ?>
    <p> <?= $comment['author'] ?></p>
    <p> <?= $comment['contents'] ?></p>
<?php endforeach; ?>
