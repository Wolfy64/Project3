<div class="col-lg">
        <table class="table table-sm table-striped table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center w-25">             Date    </th>
                    <th class="text-center w-25">             User    </th>
                    <th class="text-center w-75">             Comment </th>
                    <th class="text-center w-25" colspan="2"> Manage  </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $comment) : ?>
                    <tr>
                        <td class="text-center w-25"> <?= $comment->getDateContents() ?> </td>
                        <td class="text-center w-25"> <?= $comment->getAuthor()       ?> </td>
                        <td class="text-center w-75"> <?= $comment->getContents()     ?> </td>
                        <td class="text-center w-25"> 
                            <a href="/admin/cancelReport/<?= $comment->getID()?>">
                                <button type="button" class="btn btn-info btn-sm">Cancel</button>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/deleteReport/<?= $comment->getID()?>">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

            <tfoot>
                <tr>
                    <th class="text-center w-25"> Date          </th>
                    <th class="text-center w-25"> User          </th>
                    <th class="text-center w-75"> Comment       </th>
                    <th class="text-center w-25" colspan="2" > Manage        </th>
                </tr>
            </tfoot>
            
        </table>
</div>
