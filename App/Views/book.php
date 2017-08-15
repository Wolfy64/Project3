<?php $posts = $this->view() ?>

<?php foreach ($posts as $post => $value) { ?>
<div>
    <p> <?php echo $value['title'];        ?> </p>
    <p> <?php echo $value['dateContents']; ?> </p>
    <p> <?php echo $value['author'];       ?> </p>
    <p> <?php echo $value['contents'];     ?> </p>
    <p>
        <a href="#">Liens</a>
    </p>
</div>
<?php } ?>