<div class="col-lg">

    <?php foreach ($data as $comment) {; ?>
        <table class="table table-sm table-striped table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th> Date          </th>
                    <th> User          </th>
                    <th> Comment       </th>
                    <th> Manage        </th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td> <?= $comment->getDateContents() ?> </td>
                    <td> <?= $comment->getAuthor()       ?> </td>
                    <td> <?= $comment->getContents()     ?> </td>
                    <td rowspan="2"> 
                        <a href="/admin?page=report&amp;action=cancel<?= $comment->getID()?>">
                            <button type="button" class="btn btn-info btn-sm">Cancel</button>
                        </a>

                        <a href="/admin?page=report&amp;action=delete<?= $comment->getID()?>">
                            <button type="button" class="btn btn-danger btn-sm">Delete</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    
    <?php } ?>
</div>

