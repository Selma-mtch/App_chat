<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les valeurs du formulaire
    $mail = htmlspecialchars($_POST["addMail"]); // Nom du cookie
    $password = htmlspecialchars($_POST["password"]); // Valeur du cookie
    $duree = 86400 ; // Durée en secondes

    // Vérification des données
    if (!empty($mail) && !empty($password) && $duree > 0) {
        // Créer le cookie
        setcookie($mail, $password, time() + $duree, "/");

       // echo "Le cookie '$mail' a été créé avec la valeur '$password' pour une durée de $duree secondes.";
    } 
    
    else {
        //echo "Veuillez fournir des données valides.";
    }
} else {
    //echo "Aucune donnée reçue.";
}
?>
