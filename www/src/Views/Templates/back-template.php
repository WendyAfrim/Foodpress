<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <title><?= $this->data['title'] ?></title>
</head>

<body>
    <input type="checkbox" name="" id="sidebar_toggle">
    <div class="sidebar">
        <div class="sidebar_main">
            <div class="sidebar_user">
                <img src="https://img.icons8.com/ios/50/000000/user--v1.png" />
                <h3>Wendy Afrim</h3>
                <span>wendy.afrim2@gmail.com</span>
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
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Tous les médias
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Articles</span>
                </div>
                <ul>
                    <li>
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Créer
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Tous les articles
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Pages</span>
                </div>
                <ul>
                    <li>
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Créer
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Toutes les pages
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Produits</span>
                </div>
                <ul>
                    <li>
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Tous les produits
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Types
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Menus
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Apparence</span>
                </div>
                <ul>
                    <li>
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Menus
                        </a>
                    </li>
                </ul>
                <div class="menu_head">
                    <span>Comptes</span>
                </div>
                <ul>
                    <li>
                        <a href="">
                            <span class="las la-balance-scale"></span>
                            Tous les comptes
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Ajouter
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-chart-pie"></span>
                            Profil
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
                    <span class="las la-bars"></span>
                </label>
            </div>
            <div class="header_icons">
                <span class="las la-search"></span>
                <span class="las la-bookmark"></span>
                <span class="las la-sms"></span>
            </div>
        </header>
        <main>
            <?= require $this->view; ?>
        </main>
    </div>
</body>

</html>