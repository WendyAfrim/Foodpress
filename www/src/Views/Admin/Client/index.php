<div class="wrapper">
    <h1>Tous les clients</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Inscrit le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)) { ?>
                <?php foreach ($users as $user) {
                ?>
                    <tr>
                    <td><?= $user->id; ?></td>
                        <td><?= $user->firstname; ?></td>
                        <td><?= $user->lastname; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->phone; ?></td>
                        <td><?= $user->created_at; ?></td>
                        <td>
                            <div>
                                <i class="far fa-envelope"></i>
                                <!-- <i class="far fa-edit"></i> -->
                                <?php echo  "<i class='far fa-trash-alt btn-trash' data-item-id= $user->id  data-ajax-url='/admin/ajax/open_modal' data-ajax-filename = 'modal_delete_client'></i>"; ?>
                            </div>
                        </td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal"></div>
    <div id="overlay"></div>
</div>