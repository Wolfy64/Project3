<?php
    $title    = (isset($data)) ? $data['title']        : NULL ;
    $author   = (isset($data)) ? $data['author']       : 'Jean Forteroche' ;
    $contents = (isset($data)) ? $data['contents']     : 'Hello Jean write your text here :-)' ;
    $action   = (isset($data)) ? '/admin/modifiedPost' : 'addPost';
?>

<div class="container">

    <p>
        <h3 class="text-center">Write a post</h3>
    </p>
    
    <form method="post" action="<?= $action ?>">

        <div class="form-group">
            <p>
                <input class="form-control" type="text" name="title" placeholder="Title" value="<?= $title ?>" required>
            </p>

            <p>
                <textarea id="postContent" name="contents"><?= $contents ?></textarea>
            </p>

            <p>
                <input class="form-control" type="text" name="author" value="<?= $author ?>" required>
            </p>
        
            <?php if ( isset($data) ){ ?>
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <?php } ?>
        
            <button class="btn btn-light" type="submmit">Published</button>

        </div>

    </form>

</div>
