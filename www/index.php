<?php

namespace App;

use Symfony\Component\VarDumper\VarDumper;

//création de mon Autoload
//Il s'agit d'executer une fonction lorsqu'il y a tentative
//d'instanciation sur une class que le code ne connait pas

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

//En fonction de l'url on doit appeler la bonne methode du bon controller
// http://localhost/login -> Security -> Login()

/*
$routes = [
"login"=> ["controller"=>"Security", "action"=>"login"],
"logout"=> ["controller"=>"Security", "action"=>"logout"],
....
]
*/

//Je dois récupérer ici pour commencer l'url de l'internaute
$uri = $_SERVER["REQUEST_URI"];

//PARSER le ficher YAML
$listOfRoutes = yaml_parse_file("routes.yml");

//Si la route dans le ficheir YAML n'existe pas
//alors on récupère les informations pour la route 404
//$route = $listOfRoutes[$uri] ?? $listOfRoutes["/404"];
$superRoute = $listOfRoutes['/404'];

if (isset($listOfRoutes[$uri])) {

    $superRoute = $listOfRoutes[$uri];
    
} else {

    $dynamicRoutes = yaml_parse_file("dynamic-routes.yml");

    foreach ($dynamicRoutes as $name => $route) {
        $parsedRoute = preg_replace("/{.*?}/", "(.+)", $name,-1,$count);
        $parsedRoute = str_replace('/', '\/', $parsedRoute);
        if (preg_match("/^{$parsedRoute}$/", $uri, $matches)) {
            unset($matches[0]);
            $param = $matches[1];
            $superRoute = $dynamicRoutes[$name];
            break;
        }
    }
}
$controller = $superRoute["controller"];
$action = $superRoute["action"];


//Est-ce que le fichier controller existe
if (file_exists("src/Controllers/" . $controller . ".php")) {
    include "src/Controllers/" . $controller . ".php";

    //Est-ce que la class existe
    $controllerWithNP = "App\\Controllers\\" . $controller;

    if (class_exists($controllerWithNP)) {
        $cObject = new $controllerWithNP();
        //Est-ce que la méthode existe 
        if (method_exists($cObject, $action)) {
            if (isset($param)) {
                $cObject->$action($param);
            } else {
                $cObject->$action();
            }
        } else {
            die("La methode " . $action . " n'existe pas");
        }
    } else {
        die("La class " . $controllerWithNP . " n'existe pas");
    }
} else {
    die("Le fichier Controllers/" . $controller . ".php n'existe pas");
}
