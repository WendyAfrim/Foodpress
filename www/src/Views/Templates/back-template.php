<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Sidebar</title>
    <meta name="description" content="Figma htmlGenerator">
    <meta name="author" content="htmlGenerator">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../../dist/css/main.css">
</head>
<body>
    <header>
        <nav class="top-navbar">
            <div class="navbar-content">
                <div class="sidebar-header">
                    <h2>Tableau de bord</h2>
                </div>
                <p>Super Administrateur - Restaurant Pizza Pino</p>
                <div class="dropdown">
                    <button class="dropdown-btn button button--blue button--dropdown">Ajouter nouveau <i class="fas fa-chevron-down"></i></button>
                    <div class="dropdown-content">
                        <a href="">Pages</a>
                        <a href="">Menus</a>
                        <a href="">Extensions</a>
                        <a href="">Médias</a>
                    </div>
                </div>
                <i class="fas fa-power-off"></i>
            </div>
        </nav>
    </header>
    <main>
        <div class="sidebar">
            <div class="sidebar-header">
                <h2>Tableau de bord</h2>
            </div>
            <section>
                <h2>Contenu</h2>
                <div>
                    <li><i class="far fa-file title-icon"></i>Pages<i class="fas fa-chevron-down"></i></li>
                    <li><i class="fas fa-puzzle-piece title-icon"></i>Extensions</li>
                    <li><i class="far fa-images title-icon"></i>Médias<i class="fas fa-chevron-down"></i></li>
                </div>
            </section>
            <section>
                <h2>Apparence</h2>
                <div>
                    <li><i class="fas fa-utensils title-icon"></i>Menus<i class="fas fa-chevron-down"></i></li>
                    <li><i class="fas fa-pen-fancy title-icon"></i>Thèmes<i class="fas fa-chevron-down"></i></li>
                </div>
            </section>
            <section>
                <h2><i class="fas fa-utensils title-icon"></i>Restaurant</h2>
                <div>
                    <li><i class="far fa-calendar-alt title-icon"></i>Réservations</li>
                    <li><i class="fas fa-mouse-pointer title-icon"></i>Click'n Collect</li>
                </div>
            </section>
            <section>
                <h2>Administration</h2>
                <div>
                    <li><i class="fas fa-users title-icon"></i>Utilisateurs</li>
                    <li><i class="fas fa-cogs title-icon"></i>Réglages</li>
                </div>
            </section>
            <section>
                <h2></i>Statistiques</h2>
            </section>
        </div>
        <?php require $this->$view; ?>
    </main>
</body>

</html>