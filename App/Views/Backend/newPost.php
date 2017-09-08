<?php
    $title    = (isset($data)) ? $data['title'] : NULL ;
    $author   = (isset($data)) ? $data['author'] : 'Jean Forteroche' ;
    $contents = (isset($data)) ? $data['contents'] : 'Hello Jean write your text here :-)' ;
?>

<form method="post" action="addPost">
    <input type="text" name="title" placeholder="e.g My title" value="<?= $title ?>" required>
    <textarea id="postContent" name="contents"><?= $contents ?></textarea>
    <input type="text" name="author" value="<?= $author ?>" required>

    <button type="submmit">Published</button>
</form>