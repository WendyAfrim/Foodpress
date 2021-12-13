<body class="product-detail">
    <section class="banner">

    </section>
    <section class="section-produit">
        <div class="container">
            <div class="box-image">
                <img src="https://image.freepik.com/free-photo/decorating-delicious-homemade-eclairs-with-chocolate-peanuts_155003-1868.jpg" alt="Image du produit">
            </div>
            <div class="box-description">
                <div class="header">
                    <h1><?= $product->getName() ?></h1>
                </div>
                <div class="content">
                    <div class="description">
                        <p><?= $product->getDescription() ?></p>
                    </div>
                </div>
                <div class="cart">
                    <form action="/orderproduct/<?= $product->getId() ?>" method="post">
                        <div class="quantity">
                            <label for="quantity">Quantité</label>
                            <input type="number" class="input-quantity" name="quantity" id="quantity" value="1">
                        </div>
                        <input type="submit" value="Commander" class="button button--large button--blue">
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>