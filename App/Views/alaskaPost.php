<?php 
    $manager = $this->blogPostManager;
    $post = $this->blogPostManager->read(1); 
?>

<h1>Page de l'article !!!!</h1>

<div>
    <p>              <?php echo $post['title']                              ?> </p>
    <p> Published on <?php echo $manager->dateFormat($post['dateContents']) ?> </p>
    <p>              <?php echo $post['author']                             ?> </p>
    <p>              <?php echo $post['contents']                           ?> </p>
    <p>
        <form>
            
        </form>
    </p>
</div>
