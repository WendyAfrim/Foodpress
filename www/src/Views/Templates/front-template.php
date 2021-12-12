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
</body>

</html>
<!-- Script JS -->
<script src="../../../public/js/script.js"></script>
<script src="../../../public/js/slider.js"></script>