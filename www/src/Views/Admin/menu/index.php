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
                <?php foreach ($menu as $key => $menuLink) : ?>
                    <tr>
                        <td><?= $menuLink->getLabel(); ?></td>
                        <td><?= $menuLink->getPostId(); ?></td>
                        <td>
                            <div>
                                <a href="/admin/menu/edit/<?= $menuLink->getId() ?>"><i class="far fa-edit"></i></a>
                                <?php echo  "<i class='far fa-trash-alt btn-trash' data-item-id= {$menuLink->getId()}  data-ajax-url='/admin/ajax/open_modal' data-ajax-filename='modal_delete_menu_link'></i>"; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>
    <div id="modal" class="modal"></div>
    <div id="overlay"></div>
</div>