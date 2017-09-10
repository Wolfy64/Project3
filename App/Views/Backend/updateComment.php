<div class="container">
    <p>
        <h3 class="text-center">Write a comment</h3>
    </p>

    <form method="post" action="/admin/modifiedComment">

        <div class="form-group">

            <p>
                <input class="form-control" type="text" name="title" placeholder="<?= $data['author'] ?>" disabled>
            </p>

            <p>
                <textarea class="form-control" id="modifiedComment" name="contents"><?= $data['contents'] ?></textarea>
            </p>

            <?php if ( isset($data) ) { ?>
                <p>
                    <input class="form-control" type="hidden" name="id" value="<?= $data['id'] ?>">
                </p>
            <?php }; ?>

             <button class="btn btn-light" type="submmit">Published</button>

        </div>

    </form>
    
</div>



