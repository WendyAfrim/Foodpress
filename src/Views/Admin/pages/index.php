<div class="wrapper">
    <h1>Toutes les pages</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Titre</th>
                <th>Slug</th>
                <th>Statut</th>
                <th>Date de création</th>
                <th>Dernière mise à jour</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($pages)) { ?>
                <?php foreach ($pages as $page) {
                ?>
                    <tr>
                        <td><?= $page->getId() ?></td>
                        <td><?= $page->getTitle() ?></td>
                        <td><?= $page->getSlug() ?></td>
                        <td><?= $page->getEnabled() == 1 ? 'Activé' : 'Désactivé' ?></td>
                        <td><?= $page->getCreatedAt() ?></td>
                        <td><?= $page->getUpdatedAt() ?></td>
                        <td>
                            <div>
                                <a href="/admin/page/edit/<?= $page->getId() ?>"><i class="far fa-edit"></i></a>
                                <!-- <a href="/admin/page/delete/<?= $page->getId() ?>"><i class="far fa-trash-alt"></i></a> -->
                                <?php echo  "<i class='far fa-trash-alt btn-trash' data-item-id={$page->getId()} data-ajax-url='/admin/ajax/open_modal' data-ajax-filename = 'modal_delete_page'></i>"; ?>

                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>