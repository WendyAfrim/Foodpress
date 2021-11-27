<div class="wrapper">
    <h1>Liens du menu</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>Label</th>
                <th>Page ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($menu)) : ?>
                <?php foreach ($menu as $key => $post) : ?>
                    <tr>
                        <td><?= $post->getLabel(); ?></td>
                        <td><?= $post->getPostId(); ?></td>
                        <td>
                            <div>
                                <a href="/admin/menu/edit/<?= $post->getId() ?>"><i class="far fa-edit"></i></a>
                                <i class="far fa-trash-alt"></i>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
</div>