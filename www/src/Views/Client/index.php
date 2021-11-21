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
                <?php foreach ($users as $key => $user) {
                ?>
                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $user->firstname; ?></td>
                        <td><?= $user->lastname; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->phone; ?></td>
                        <td><?= $user->created_at; ?></td>
                        <td>
                            <div>
                                <i class="far fa-envelope"></i>
                                <i class="far fa-edit"></i>
                                <i class='far fa-trash-alt btn-modal' data-modal-target="#modal"></i>
                            </div>
                        </td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal ">
        <div class="modal-header">
            <div class="title">Attention !</div>
            <div class="close-button" data-close-button>&times;</div>
        </div>
        <div class="modal-body">
            Souhaitez-vous supprimer ce client ?
        </div>
        <div class="modal-footer">
            <?php echo  "<a href='/admin/client/delete/{$user->id}' class='btn_modal btn_modal--danger' data-modal-target='#modal'>Oui</a>"; ?>
            <button class="btn_modal">Non</button>
        </div>
    </div>
    <div id="overlay"></div>
</div>
<script>
    var btn_close = $("[data-close-button]");
    var overlay = $('#overlay');


    $(document).on('click', $("[data-modal-target]"), function(e) {

        var that = $(this);
        var modal = $('#modal');

        openModal(modal);
    })


    $(document).on('click', $("[data-close-button]"), function() {
        var modal = $('#modal');
        console.log(modal)
        closeModal(modal)
    })


    function closeModal(modal) {
        if (modal == null) return
        modal.remove('active')
        overlay.remove('active')
    }

    function openModal(modal) {
        if (modal == null) return
        modal.addClass('active');
        overlay.addClass('active');
    }
</script>