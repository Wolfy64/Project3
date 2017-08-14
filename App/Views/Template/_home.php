<?php $this->title = 'Jean Forteroche\'s Blog - '?>

<?php foreach( $blogPostList as $post ): ?>

<article>

    <a href=" <?= 'index.php?action=post&id=' . $post['id'] ?>" >  
        <h1> <?= $post['title'] ?> </h1>
    </a> 

    <time> <?= $post['dateContents'] ?> </time>

    <p> <?= $post['contents'] ?> </p>    

</article>

<?php endforeach; ?>