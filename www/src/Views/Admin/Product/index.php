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
                <th>Crée le</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)) { ?>
                <?php foreach ($products as $product) {
                ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['type'] ?></td>
                        <td><?= $product['description'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['ingredients'] ?></td>
                        <td><?= $product['image'] ?></td>
                        <td><?= $product['created_at'] ?></td>
                        <td>
                            <div>
                                <a href="/admin/product/update/<?= $product['id'] ?>"><i class="far fa-edit"></i></a>
                                <i class='far fa-trash-alt btn-trash' data-item-id="<?= $product['id'] ?>" data-ajax-url='/admin/ajax/open_modal' data-ajax-filename = 'modal_delete_product'></i>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>