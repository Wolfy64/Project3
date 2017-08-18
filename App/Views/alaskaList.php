<?php $manager = $this->blogPostManager; ?>

<?php foreach ($manager->readAllPost() as $post => $value) { ?>
<div>
    <p>              <?= $value['title'];                              ?> </p>
    <p> Published on <?= $manager->dateFormat($value['dateContents']); ?> </p>
    <p>              <?= $value['author'];                             ?> </p>
    <p>              <?= $manager->readSummary($value['contents']);    ?> </p>
    <p>
        <a href= "?post=<?= $value['id'] ?>" >Read the post</a>
    </p>
</div>
<?php } ?>