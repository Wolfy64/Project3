<?php $posts = $this->view() ?>

<?php foreach ($posts as $post => $value) { ?>
<div>
    <p> <?php echo $value['title'];                   ?> </p>
    <p> <?php echo $value['dateContents'];            ?> </p>
    <p> <?php echo $value['author'];                  ?> </p>
    <p> <?php $this->readSummary($value['contents']); ?> </p>
    <p>
        <a href= "post= <?php echo $value['id'] ?>" >Read the post</a>
    </p>
</div>
<?php } ?>