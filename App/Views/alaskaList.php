<?php $posts = $this->view() ?>

<?php foreach ($posts as $post => $value) { ?>
<div>
    <p> <?php echo $value['title']; ?> </p>
    <p> Published on <?php echo $this->blogPostManager->dateFormat($value['dateContents']); ?> </p>
    <p> <?php echo $value['author']; ?> </p>
    <p> <?php echo $this->blogPostManager->readSummary($value['contents']); ?> </p>
    <p>
        <a href= "?post= <?php echo $value['id'] ?>" >Read the post</a>
    </p>
</div>
<?php } ?>