<h1>Report Comments</h1>

<?php foreach ($data as $comment) { ?>

    <table class="table table-striped table-responsive">
    <tr>
        <th scope="row"> Date          </th>
        <th scope="row"> User          </th>
        <th scope="row"> Comment       </th>
        <th scope="row"> Delete        </th>
    </tr>
    <tr>
        <td> <?= $comment->getDateContents() ?> </td>
        <td> <?= $comment->getAuthor()       ?> </td>
        <td> <?= $comment->getContents()     ?> </td>
        <td> 
            <a href="admin/cancel=<?= $comment->getID()?>">
                <button>Cancel</button>
            </a>
            <a href="admin/delete=<?= $comment->getID()?>">
                <button>Delete</button>
            </a>
         </td>
    </tr>
    </table>

<?php } ?>
