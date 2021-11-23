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
                                <i class='far fa-trash-alt btn-trash' data-user-id=<?= $user->id ?>></i>
                            </div>
                        </td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal">
        <div class="modal-header">
            <div class="title">Attention !</div>
            <div class="btn-close" data-close-button="#modal">&times;</div>
        </div>
        <div class="modal-body">
            Etes-vous sur de vouloir supprimer ce client ?
        </div>
        <div class="modal-footer">
            <?php echo  "<a href='/admin/client/delete/{$user->id}' id='btn-consent' class='btn_modal btn_modal--danger'>Oui</a>"; ?>
            <button class="btn_modal btn-close">Non</button>
        </div>
    </div>
    <div id="overlay"></div>
</div>
<script>
    var overlay = $('#overlay');


    $(document).ready(function() {
        $('.btn-trash').click(function() {
            var that = $(this);
            var user_id = that.attr('data-user-id');

            var btn_consent = $('#btn-consent');
            var href = '/admin/client/delete/' + user_id

            btn_consent.attr('href', href);

            console.log(btn_consent);

            $('#modal').addClass("active");
            overlay.addClass("active");
        });

        $('.btn-close').click(function() {
            $('#modal').removeClass("active");
            overlay.removeClass("active");
        });
    });
</script>