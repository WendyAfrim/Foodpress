<?php

use App\Helpers\FlashMessage;

$flashMessage = new FlashMessage();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/admin.css">
    <!-- Icons CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!--  JQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Datatables CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <title><?= $this->data['title'] ?></title>
</head>

<body>
    <input type="checkbox" name="" id="sidebar_toggle">
    <div class="sidebar">
        <div class="sidebar_main">
            <div class="sidebar_user">
                <img src="https://img.icons8.com/ios/50/000000/user--v1.png" />
                <h3><?= $user->getFirstname() ?> <?= $user->getLastname() ?></h3>
                <span><?= $user->getEmail() ?></span>
            </div>
        </div>
        <div class="sidebar_menu">
            <div class="menu_block">
                <div class="menu_head">
                    <span>Tableau de bord</span>
                </div>
                <div class="menu_head">
                    <span>Médiathèque</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/media/add-media">
                            <i class="far fa-plus-square"></i>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <a href="/admin/media">
                            <i class="fas fa-compact-disc"></i>
                            Tous les médias
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Pages</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/pages">
                            <i class="fas fa-grip-vertical"></i>
                            Toutes les pages
                        </a>
                    </li>
                    <li>
                        <a href="/admin/page/add">
                            <i class="far fa-file"></i>
                            Ajouter
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Produits</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/products">
                            <i class="fas fa-pizza-slice"></i>
                            Tous les produits
                        </a>
                    </li>
                    <li>
                        <a href="/admin/product/create">
                            <i class="far fa-plus-square"></i>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <a href="/admin/type/create">
                            <i class="fas fa-align-center"></i>
                            Types
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-cocktail"></i>
                            Menus
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Apparence</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/menu">
                            <i class="fas fa-bars"></i>
                            Menu
                        </a>
                    </li>
                    <li>
                        <a href="/admin/menu/add">
                            <i class="far fa-plus-square"></i>
                            Ajouter un lien
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Clients</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/clients">
                            <i class="fal fa-users"></i>
                            Tous les clients
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Comptes</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/accounts">
                            <i class="fas fa-users"></i>
                            Tous les comptes
                        </a>
                    </li>
                    <li>
                        <a href="/admin/account/create">
                            <i class="far fa-plus-square"></i>
                            Ajouter
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Paramètres</span>
                </div>
                <ul>
                    <li>
                        <a href="/admin/settings">
                            <i class="fas fa-cog"></i>
                            Général
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="main_content">
        <header>
            <div class="menu-toggle">
                <label for="sidebar_toggle">
                    <i class="fas fa-hamburger"></i>
                </label>
            </div>
            <div class="header_icons">
                <a href=""><i class="far fa-user"></i></a>
                <a href="/admin"><i class="fas fa-home"></i></a>
            </div>
        </header>
        <main>
            <?=
            $flashMessage->display();
            require $this->view; ?>
            <div id="modal" class="modal"></div>
            <div id="overlay"></div>
        </main>
        <!-- </div> -->
    </div>
</body>

</html>
<!-- Modal -->
<script src="../../../public/js/modal.js"></script>
<!-- Flash Message -->
<script src="../../../public/js/flashMessage.js"></script>
<!-- Datatable -->
<script src="../../../public/js/datatable.js"></script>