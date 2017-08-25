<?php foreach ($data as $post) { ?>

    <div>
        <p>              <?= $post->getTitle();        ?> </p>
        <p> Published on <?= $post->getdateContents(); ?> </p>
        <p>              <?= $post->getAuthor();       ?> </p>
        <p>              <?= $post->readSummary();     ?> </p>
        <p>
            <a href= "?post=<?= $post->getId() ?>" >Read the post</a>
        </p>
    </div>

<?php } ?>