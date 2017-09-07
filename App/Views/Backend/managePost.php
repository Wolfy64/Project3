<div class="col-lg">
        <table class="table table-sm table-striped table-responsive table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center w-25">             Date   </th>
                    <th class="text-center w-25">             Author </th>
                    <th class="text-center w-75">             Title  </th>
                    <th class="text-center w-25" colspan="2"> Manage </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $post) : ?>
                    <tr>
                        <td class="text-center w-25"> <?= $post->getDateContents() ?> </td>
                        <td class="text-center w-25"> <?= $post->getAuthor()       ?> </td>
                        <td class="text-center w-75"> <?= $post->getTitle()        ?> </td>
                        <td class="text-center w-25"> 
                            <a href="/admin/updatePost/<?= $post->getID()?>">
                                <button type="button" class="btn btn-info btn-sm">Update</button>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/deletePost/<?= $post->getID()?>">
                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

            <tfoot>
                <tr>
                    <th class="text-center w-25">              Date   </th>
                    <th class="text-center w-25">              Author </th>
                    <th class="text-center w-75">              Title  </th>
                    <th class="text-center w-25" colspan="2" > Manage </th>
                </tr>
            </tfoot>
            
        </table>
</div>