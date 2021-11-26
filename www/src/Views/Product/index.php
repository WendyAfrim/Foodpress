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
                <?php foreach ($products as $product) {
                ?>

                    <tr>
                        <td><?= $product->getId(); ?></td>
                        <td><?= $product->getName(); ?></td>
                        <td><?= $product->getType(); ?></td>
                        <td><?= $product->getDescription(); ?></td>
                        <td><?= $product->getPrice(); ?></td>
                        <td><?= $product->getIngredients(); ?></td>
                        <td><?= $product->getImage(); ?></td>
                        <td><?= $product->getCreatedAt(); ?></td>
                        <td>
                            <div>
                                <a href="/admin/product/update/<?= $product->getId() ?>"><i class="far fa-edit"></i></a>
                                <a href="/admin/product/delete/<?= $product->getId() ?>"><i class="far fa-trash-alt"></i>
                            </div>
                        </td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>