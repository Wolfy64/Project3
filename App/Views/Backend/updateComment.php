<form method="post" action="modifiedComment">
    <input type="text" name="title" placeholder="<?= $data['author'] ?>" disabled>
    <textarea id="modifiedComment" name="contents"><?= $data['contents'] ?></textarea>
    <input type="hidden" name="id" placeholder="<?= $data['id'] ?>">

    <button type="submmit">Published</button>
</form>