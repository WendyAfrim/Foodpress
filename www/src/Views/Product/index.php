<div class="wrapper">
    <h1>Tous les produits</h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Description</th>
                <th>Prix</th>
                <th>ingrédients</th>
                <th>Image</th>
                <th>Mis à jour le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)) { ?>
                <?php foreach ($products as $key => $product) {
                ?>

                    <tr>
                        <td><?= $key; ?></td>
                        <td><?= $product->name; ?></td>
                        <td><?= $product->type; ?></td>
                        <td><?= $product->description; ?></td>
                        <td><?= $product->price; ?></td>
                        <td><?= $product->ingredients; ?></td>
                        <td><?= $product->image; ?></td>
                        <td><?= $product->created_at; ?></td>
                        <td>
                            <div>
                                <i class="far fa-envelope"></i>
                                <i class="far fa-edit"></i>
                                <i class="far fa-trash-alt"></i>
                            </div>
                        </td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>