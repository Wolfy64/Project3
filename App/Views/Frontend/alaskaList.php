<div class="col-lg">
    <?php foreach ($data as $post) { ?>
    
        <article class="border border-secondary rounded m-3 p-2">
            <h3>             <?= $post->getTitle();        ?> </h3>
            <p> Published on <?= $post->getdateContents(); ?> </p>
            <p>              <?= $post->getAuthor();       ?> </p>
            <p>              <?= $post->readSummary();     ?> </p>
            <p>
                <a href= "?post=<?= $post->getId() ?>" >Read the post</a>
            </p>
        </article>
    
    <?php } ?>
</div>