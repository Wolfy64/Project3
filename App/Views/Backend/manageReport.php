<div class="col-lg">

        <p>
            <h3 class="text-center">Manage reports</h3>
        </p>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">             Date    </th>
                    <th class="text-center">             User    </th>
                    <th class="text-center">             Comment </th>
                    <th class="text-center" colspan="2"> Manage  </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $comment) : ?>
                    <tr>
                        <td class="text-center"> <?= $comment->getDateContents() ?> </td>
                        <td class="text-center"> <?= $comment->getAuthor()       ?> </td>
                        <td class="text-justify"> <?= $comment->getContents()    ?> </td>
                        <td class="text-center"> 
                            <a href="/admin/cancelReport/<?= $comment->getID()?>">
                                <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-check-square-o fa-lg"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/deleteReport/<?= $comment->getID()?>">
                                <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
</div>
