<h1>Formulaire | Ajout d'un type</h1>
<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<div class="row">
    <div class="col-lg-4">
        <?= $form; ?>
    </div>
    <div class="col-lg-8">
        <table id="myDatatable">
            <thead>
                <th>Nom</th>
                <th>Actif</th>
                <th>Total</th>
                <th>Crée le</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if (!empty($types)) { ?>
                    <?php foreach ($types as $type) {
                    ?>
                        <tr>
                            <td><?= $type->name ?></td>
                            <td><?= $type->is_enable == true ? "Oui" : "Non" ?></td>
                            <td></td>
                            <td><?= $type->created_at  ?></td>
                            <td>
                                <div>
                                    <?php echo  "<i class='far fa-trash-alt btn-trash' data-item-id= {$type->getId()}  data-ajax-url='/admin/ajax/open_modal' data-ajax-filename='modal_delete_type'></i>"; ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        var container = $('#container');
        container.removeClass('container');
        console.log($('.container'))
    })
</script>