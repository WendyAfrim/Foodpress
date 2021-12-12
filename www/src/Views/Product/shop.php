<body>
    <!-- Dishes section -->
    <section class="dishes" id="dishes">
        <h3 class="sub-heading">our dishes</h3>
        <h1 class="heading">popular dishes</h1>
        <div class="box-container">
            <?php if (isset($products) && !empty($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="box">
                        <img src="https://img.freepik.com/free-photo/front-view-tasty-meat-burger-with-cheese-salad-dark-background_140725-89597.jpg?size=338&ext=jpg" alt="">
                        <h3><?= $product->getName() ?></h3>
                        <a href="" class="fas fa-heart"></a>
                        <a href="" class="fas fa-eye"></a>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span><?= $product->getPrice() ?>€</span>
                        <a href="/product/<?= $product->getId() ?>" class="btn">add to cart</a>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <h2>Aucun produit</h2>
            <?php endif ?>
        </div>
    </section>
    <!-- Dishes section ends -->
</body>

</html>

<!-- Script JS -->
<script src="../../../public/js/script.js"></script>