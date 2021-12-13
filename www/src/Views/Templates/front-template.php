<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--  JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<body>
    <!-- Header section begin -->
    <header>
        <a href="#" class="logo"><i class="fas fa-utensils"></i><?= $siteName ?></a>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="/">Accueil</a>
                    <a href="/shop">Nos produits</a>
                    <a href="">Contactez-nous</a>
                </li>
                <?php foreach ($nav_items as $item) : ?>
                    <li>
                        <a href="<?= $item->link ?>"><?= $item->getLabel() ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bar"></i>
            <a href="/login"><i class="fas fa-user"></i></a>
            <a href="/register"><i class="fas fa-pencil-alt"></i></i></a>
        </div>
    </header>
    <!-- Header section ends -->

    <?php require $this->view; ?>

</body>
<section class="footer">
    <div class="social">
        <a href=""><i class="fab fa-instagram"></i></a>
        <a href=""><i class="fab fa-facebook"></i></a>
        <a href=""><i class="fab fa-twitter"></i></a>
        <a href=""><i class="fab fa-snapchat"></i></a>
    </div>
    <ul class="list">
        <li>
            <a href="/">Accueil</a>
        </li>
        <li>
            <a href="/shop">Nos produits</a>
        </li>
        <li>
            <a href="">Qui sommes-nous ? </a>
        </li>
        <li>
            <a href="">CGV</a>
        </li>
        <li>
            <a href="">Politique de confidentialité</a>
        </li>
    </ul>
    <p class="copyright">
        © Copyright 2021 | Foodpress
    </p>
</section>

</html>
<!-- Script JS -->
<script src="../../../public/js/script.js"></script>
<script src="../../../public/js/slider.js"></script>