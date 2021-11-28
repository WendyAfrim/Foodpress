<div class="wrapper">
    <h1>Tous les comptes</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Inscrit le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) { ?>
                <?php foreach ($users as $user) {
                ?>
                    <tr>
                    <td><?= $user->getId(); ?></td>
                        <td><?= $user->getFirstname(); ?></td>
                        <td><?= $user->getLastname(); ?></td>
                        <td><?= $user->getEmail(); ?></td>
                        <td><?= $user->getRoles(); ?></td>
                        <td><?= $user->getCreatedAt(); ?></td>
                        <td>
                            <div>
                                <i class="far fa-edit"></i>
                                <?php echo  "<i class='far fa-trash-alt btn-trash' data-item-id= {$user->getId()}  data-ajax-url='/admin/ajax/open_modal' data-ajax-filename='modal_delete_admin'></i>"; ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal"></div>
    <div id="overlay"></div>
</div>