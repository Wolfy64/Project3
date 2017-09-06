<div class="col-lg">
    <?php foreach ($data as $post) { ?>
    
        <article class="border rounded bg-light m-3 p-2">
            <h3 class="text-center"> <?= $post->getTitle(); ?> </h3>

            <p> <?= $post->readSummary(); ?> </p>
            <p>
                <a href= "alaska/post/<?= $post->getId() ?>" >
                    <button type="button" class="btn btn-primary btn-sm">Read the post</button> 
                </a>
            </p>
            <p class="text-sm-right font-italic"> 
                On <?= $post->getdateContents(); ?> by <?= $post->getAuthor();?> 
            </p>
        </article>
    
    <?php } ?>
</div>