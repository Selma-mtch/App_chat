<?php

// Inclusion des dépendances
require_once "Models/Model.php";
require_once "Controllers/Controller.php";
require_once "Controllers/Controller_connexion.php";

// Liste des contrôleurs
$controllers = ["connexion", "accueil", "deconnexion", "changePseudo", "changemdp", "inscription"]; 

// Nom du contrôleur par défaut
$controller_default = "connexion";

// Vérifie si le paramètre controller existe et correspond à un contrôleur valide
if (isset($_GET['controller']) and in_array($_GET['controller'], $controllers)) {
    $nom_controller = $_GET['controller'];
} else {
    $nom_controller = $controller_default;
}

// Détermine le nom de la classe du contrôleur
$nom_classe = 'Controller_' . $nom_controller;

// Détermine le nom du fichier contenant la définition du contrôleur
$nom_fichier = 'Controllers/' . $nom_classe . '.php';

// Si le fichier existe et est accessible en lecture
if (is_readable($nom_fichier)) {
    // Inclut le fichier et instancie un objet de cette classe
    require_once $nom_fichier;
    new $nom_classe();
} else {
    die("Error 404: not found!");
}
