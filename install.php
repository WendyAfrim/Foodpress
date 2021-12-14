<?php

namespace App;

use App\Core\Database;
use App\Helpers\Generator;
use App\Helpers\Session;
use App\Models\Setting;
use App\Models\User;
use Dotenv\Dotenv;
use Exception;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register("App\myAutoloader");

function myAutoloader($class)
{

    // Tentatitve d'instance de App\Core\View
    // App\Core\View -> App/Core/View
    $class = str_replace("\\", "/", $class);
    // App/Core/View -> Core/View
    $class = str_ireplace("App/", "src/", $class);
    // Core/View -> Core/View.php
    $class .= ".php";

    if (file_exists($class)) {
        include $class;
    }
}

if (!empty($_POST['db_name']) || !empty($_POST['db_host']) || !empty($_POST['db_port']) || !empty($_POST['db_user']) || !empty($_POST['db_password'])) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlentities($value);
    }

    try {
        //Verification de l'extension YAML
        /* if (!extension_loaded('yaml')) {
                throw new Exception("L'application nécessite l'activation de l'extension YAML de PHP");
            } */
        $data = "DB_HOST={$_POST['db_host']}" . PHP_EOL .
            "DB_NAME={$_POST['db_name']}" . PHP_EOL .
            "DB_PORT={$_POST['db_port']}" . PHP_EOL .
            "DB_USER={$_POST['db_user']}" . PHP_EOL .
            "DB_PASSWORD={$_POST['db_password']}";
        if (!file_put_contents('./.env', $data)) {
            throw new Exception("Erreur lors de l'écriture du fichier .env");
        }

        // Création des tables
        $db = Database::getPdo();

        $dbSql = file_get_contents('./db/db.sql');

        $db->exec($dbSql);


        // Création d'un user admin
        $user = new User;
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setRole('admin');
        $user->setCreatedAt(Generator::generateDate());
        $user->save();

        // Mise à jour du nom du site
        $site_name = (new Setting)->findByOne(['name' => 'site_name']);
        $site_name->setValue($_POST['site_name']);
        $site_name->save();



        $success = true;
    } catch (Exception $e) {
        $error = $e->getMessage();
        file_put_contents('./.env', "");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/main.css">
    <title>Installation de Foodpress</title>
</head>

<body>
    <style>
        * {
            font-size: 1.5rem;
        }

        hr {
            border: 1px solid gainsboro;
            margin: 1em 0;
        }
    </style>

    <h1>Installation de Foodpress</h1>
    <div style="display: flex; flex-direction: column; align-items: center">
    <?php if (!empty($error)) : ?>
        <div class="alert--danger" style="padding: 1em; color: black;">
        <?= $error ?>
        </div>
    <?php endif; ?>
        <?php if (empty($_ENV['DB_NAME']) || empty($_ENV['DB_HOST']) || empty($_ENV['DB_PORT']) || empty($_ENV['DB_USER']) || empty($_ENV['DB_PASSWORD'])) : ?>

            <form id="install_form" style="max-width: 80%; display: flex;" action="" method="post">

                <div style="margin: 1em;">
                    <h2>Configuration de la base de donnée</h2>
                    <hr>
                    <div>
                        <label for="db_host">Hôte</label>
                        <input class="inputs-design" type="text" id="db_host" name="db_host">
                    </div>
                    <div>
                        <label for="db_port">Port</label>
                        <input class="inputs-design" type="text" id="db_port" name="db_port">
                    </div>
                    <div>
                        <label for="db_name">Nom de la base</label>
                        <input class="inputs-design" type="text" id="db_name" name="db_name">
                    </div>
                    <div>
                        <label for="db_user">Utilisateur</label>
                        <input class="inputs-design" type="text" id="db_user" name="db_user">
                    </div>
                    <div>
                        <label for="db_password">Mot de passe</label>
                        <input class="inputs-design" type="text" id="db_password" name="db_password">
                    </div>
                </div>

                <div style="margin: 1em;">
                    <h2>Configuration de l'administrateur</h2>
                    <hr>
                    <div>
                        <div>
                            <label for="firstname">Prénom</label>
                            <input class="inputs-design" type="text" id="firstname" name="firstname">
                        </div>
                        <div>
                            <label for="lastname">Nom</label>
                            <input class="inputs-design" type="text" id="lastname" name="lastname">
                        </div>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input class="inputs-design" type="text" id="email" name="email">
                    </div>
                    <div>
                        <label for="password">Mot de passe</label>
                        <input class="inputs-design" type="text" id="password" name="password">
                    </div>
                </div>

                <div style="margin: 1em;">
                    <h2>Configuration du site</h2>
                    <hr>
                    <div>
                        <label for="site_name">Nom du site</label>
                        <input class="inputs-design" type="text" id="site_name" name="site_name">
                    </div>
                </div>
            </form>

            <input form="install_form" style="margin: auto; display: block;" type="submit" class="btn">

        <?php elseif (!empty($success)) : ?>
            <p>Configuration terminée!</p>
            <a class="btn margin: auto; display: block;" href="./">Accueil</a>
            <a class="btn margin: auto; display: block;" href="./admin">Panel d'administration</a>
        <?php endif ?>
    </div>
</body>

</html>