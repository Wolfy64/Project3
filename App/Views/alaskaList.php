<?php foreach ($data as $post) { ?>

    <article class="border border-secondary rounded m-3 p-2">
        <p>              <?= $post->getTitle();        ?> </p>
        <p> Published on <?= $post->getdateContents(); ?> </p>
        <p>              <?= $post->getAuthor();       ?> </p>
        <p>              <?= $post->readSummary();     ?> </p>
        <p>
            <a href= "?post=<?= $post->getId() ?>" >Read the post</a>
        </p>
    </article>

<?php } ?>