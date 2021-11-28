<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<body>
    <header class="front-header">
        <div class="front-header__top">
            <h1 class="front-header__sitename">Nom du site</h1>
            <div class="front-header__auth">
                <a href="/login"><button class="button--large button--violet">Login</button></a>
                <a href="/register"><button class="button--large button--violet">Register</button></a>
            </div>
        </div>
        <nav class="front-header__nav">
            <ul>
                <?php foreach ($nav_items as $item) : ?>
                    <li><a href="<?= $item->link ?>"><?= $item->getLabel() ?></a></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>

    <?php require $this->view; ?>
</body>