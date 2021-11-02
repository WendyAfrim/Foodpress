<div class="wrapper">
    <h1>Tous les compte</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
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
                        <td><?= $user->created_at; ?></td>
                        <td>
                            <div>
                                <i class="las la-eye"></i>
                                <i class="las la-envelope"></i>
                                <i class="las la-pen"></i>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>