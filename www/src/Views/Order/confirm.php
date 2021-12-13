<body class="product-detail">
    <?php if (isset($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
    <section class="banner">

    </section>
    <section class="section-produit">
        <div class="container">
            <div class="box-description">
                <div class="header">
                    <h1>Commande confirmée !</h1>
                </div>
                <div class="content">
                    <p>Nous vous remercions pour votre commande. Un mail vous a été envoyé avec tous les détails la concernant.
                    <h1>Produit: <?= $product->getName() ?></h1>
                    <h1>Quantité: <?= $order->getQuantity() ?></h1>
                </div>
            </div>
        </div>
    </section>
</body>