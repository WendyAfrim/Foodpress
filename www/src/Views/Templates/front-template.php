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
        <a href="#" class="logo"><i class="fas fa-utensils"></i>Resto</a>
        <nav class="navbar">
            <ul>
                <?php foreach ($nav_items as $item) : ?>
                    <li>
                        <a href="<?= $item->link ?>"><?= $item->getLabel() ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bar"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <i class="fas fa-shopping-cart"></i>
        </div>
    </header>
    <!-- Header section ends -->

    <?php require $this->view; ?>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <img src="https://freedesignfile.com/upload/2019/06/Fresh-food-logo-creative-design-vectors-02.jpg" alt="">
                <p>Foodpress vous accompagne dans la conception de sites internet pour mieux vendre vos plats ! :)</p>
                <div class="socials">
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-twitter "></i></a>
                    <a href=""><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="footer-right">
                <div class="box">
                    <h2>Product</h2>
                    <ul>
                        <li><a href="">Accueil</a></li>
                        <li><a href="">Nos produits</a></li>
                        <li><a href="">Wordpress</a></li>
                        <li><a href="">Joomla</a></li>
                    </ul>
                </div>
                <div class="box">
                    <h2>Liens utiles</h2>
                    <ul class="box">
                        <li><a href="">CGV</a></li>
                        <li><a href="">Politique de confidentialité</a></li>
                        <li><a href="">Connexion/Inscription</a></li>
                    </ul>
                </div>
                <div class="box">
                    <h2>Address</h2>
                    <ul class="box">
                        <li><a href="">3 Cours Sainte Marthe</a></li>
                        <li><a href="">Thiais</a></li>
                        <li><a href="">94320</a></li>
                        <li><a href="">France</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© Copyright 2021 - All Right reserved</p>
        </div>
    </footer>
</body>

</html>
<!-- Script JS -->
<script src="../../../public/js/script.js"></script>
<script src="../../../public/js/slider.js"></script>