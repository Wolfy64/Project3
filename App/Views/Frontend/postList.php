<?php 
require_once('Models/BlogPostManager.php');
$book = new BlogPostManager();
$book->read();
var_dump($book->read());
var_dump($book->getTitle());

$postList = $book->read();
foreach ($postList as $key => $value) {
    echo $postList->getTitle();
}

?>
<h1> <?php echo $book->getTitle() ?> </h1>

<div>
    <p> <?php echo $book->getPostBlog() ?> </p>
</div>