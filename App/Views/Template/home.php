<?php $title = 'Jean Forteroche\'s Blog'; ?>

<?php ob_start(); ?>

<?php foreach( $blogPost as $post ): ?>
<article>
    <h1> <?= $post['title'] ?> </h1>
    <time> <?= $post['dateContents'] ?> </time>
    <p> <?= $post['contents'] ?> </p>    
</article>

<?php endforeach; ?>
<?php $contents = ob_get_clean() ?>

<?php require_once('Views/Template/layout.php'); ?>