<div class="col-lg">
    
        <p>
            <h3 class="text-center">Manage posts</h3>
        </p>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">             Date   </th>
                    <th class="text-center">             Author </th>
                    <th class="text-center">             Title  </th>
                    <th class="text-center" colspan="2"> Manage </th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $post) : ?>
                    <tr>
                        <td class="text-center"> <?= $post->getDateContents() ?> </td>
                        <td class="text-center"> <?= $post->getAuthor()       ?> </td>
                        <td class="text-justify"> <?= $post->getTitle()       ?> </td>
                        <td class="text-center"> 
                            <a href="/admin/updatePost/<?= $post->getID()?>">
                                <button type="button" class="btn btn-secondary btn-sm"><i class="fa fa-pencil-square-o fa-lg"></i></button>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/deletePost/<?= $post->getID()?>">
                                <button type="button" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash fa-lg"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

            <tfoot>
                <tr>
                    <th class="text-center">              Date   </th>
                    <th class="text-center">              Author </th>
                    <th class="text-center">              Title  </th>
                    <th class="text-center" colspan="2" > Manage </th>
                </tr>
            </tfoot>
            
        </table>
</div>