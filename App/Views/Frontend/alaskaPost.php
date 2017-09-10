<div class="container">

    <div class="col-lg">

        <!-- Show Post -->
        <article class="border border-secondary bg-light rounded m-3 p-2">
            <h3>             <?= $data->getTitle();       ?> </h3>
            <p> Published on <?= $data->getDateContents() ?> </p>
            <p>              <?= $data->getAuthor();      ?> </p>
            <p>              <?= $data->getContents();    ?> </p>
            <p> 
                <a href="#comment">
                    <button type="button" class="btn btn-outline-dark btn-sm">Add Comment</button>   
                </a>           
            </p>
        </article>
        
        <!-- Show Comment -->
        <?php foreach ($data->getCommentList() as $comment) { ?>
        
            <div class="border border-light bg-light rounded m-3 p-2">
                <p> Posted by <?= $comment->getAuthor() ?> on <?= $comment->getDateContents() ?> </p>
                <p> <?= $comment->getContents()     ?> </p>
                <form action="/report" method="post">
                    <button class="btn btn-dark btn-sm " value='<?= $comment->getId() ?>' type="submit" name="report"> <i class="fa fa-flag fa-lg" color="red"></i> </button>
                    <input type="hidden" name="idBlogAlaska" value="<?= $data->getID() ?>">
                </form>
            </div>
        <?php } ?>
        
        <!-- Add Comment -->
        <div class="border border-light rounded m-3 p-2">


            <form action="/addComment" method="post">

                <div class="form-group">  
                    <label id="comment">Something to say?</label>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="comment[author]" placeholder="Nickname" required>
                </div>
                
                <div class="form-group">
                    <textarea class="form-control" name="comment[contents]" placeholder="Write your comment" required></textarea>
                </div>

                <input type="hidden" name="comment[idBlogAlaska]" value="<?= $data->getID() ?>">
                
                <button type="submit" class="btn btn-light">Add your comment</button>
                <button type="reset" class="btn btn-light">Reset</button>
    
            </form>

        </div>

    </div>
    
</div>