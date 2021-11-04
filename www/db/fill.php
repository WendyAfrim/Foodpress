<?php

namespace App\Fill;

require '../vendor/autoload.php';

use PDO;
use PDOException;

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

$pdo = new PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";port=" . $_ENV['DB_PORT'] . "", "" . $_ENV['DB_USER'] . "", "" . $_ENV['DB_PASSWORD'] . "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
]);
$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE user');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');

$faker = \Faker\Factory::create('fr_FR');
$error = null;

try {
    for ($i = 0; $i < 50; $i++) {
        $lastname = $faker->lastName;
        $firstname = $faker->firstName;
        $email = $faker->unique()->email;
        $address = $faker->streetAddress;
        $zipcode = $faker->postcode;
        $city = $faker->city;
        $phone = $faker->phoneNumber;
        $roles = $faker->randomElement(["admin", "editor", "client"]);
        $created_at = $faker->dateTimeThisCentury->format('Y-m-d');
        $password = password_hash('123456', PASSWORD_DEFAULT);

        $request = $pdo->prepare("INSERT INTO user (lastname,firstname,email,address,zipcode,city,phone,roles,created_at,password) VALUES (:lastname,:firstname,:email,:address,:zipcode,:city,:phone,:roles,:created_at,:password)");
        $request->execute([
            "lastname" => $lastname,
            "firstname" => $firstname,
            "email" => $email,
            "address" => $address,
            "zipcode" => $zipcode,
            "city" => $city,
            "phone" => $phone,
            "roles" => $roles,
            "created_at" => $created_at,
            "password" => $password
        ]);
        echo "L'utilisateur $firstname $lastname a bien été ajouté<br>";
    }
    echo "<span style='font-weight: bold'>Base de données bien remplie !</span> &#x1F354";

} catch (PDOException $e) {
    echo "Problème lors du remplissage de la base de données<br>";
    echo "Erreur: <span style='font-weight: bold'>" . $e . "</span>";
}