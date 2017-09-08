<form method="post" action="/admin/modifiedComment">
    <input type="text" name="title" placeholder="<?= $data['author'] ?>" disabled>
    <textarea id="modifiedComment" name="contents"><?= $data['contents'] ?></textarea>

    <?php if ( isset($data) ) { ?>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <?php }; ?>
    <button type="submmit">Published</button>
</form>