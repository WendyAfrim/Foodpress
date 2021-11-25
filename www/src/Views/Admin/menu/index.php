<div class="wrapper">
    <h1>Liens du menu</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>Position</th>
                <th>Label</th>
                <th>Page ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($menu)) : ?>
                <?php foreach ($menu as $key => $post) : ?>
                    <tr>
                        <td><?= $post->position; ?></td>
                        <td><?= $post->label; ?></td>
                        <td><?= $post->page_id; ?></td>
                        <td>
                            <div>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>