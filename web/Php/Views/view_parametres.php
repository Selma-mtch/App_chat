<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres et Confidentialité</title>
    <link rel="stylesheet" href="../css/parametres.css">
    <script src="../js/theme.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="alll">
    <header>
        <section id="header-container">
            <a href="#" onclick="history.back(); return false;">
                <img id="retour" src="../img/retour.webp" alt="Retour">
            </a>
            <h1 id="titre">   
                Paramètres et confidentialité
            </h1>
        </section>
    </header>

        <main>
        <section id="all">
            
            <a href="index.php?controller=politique">
                <div class="setting-item">
                    <i class="fas fa-shield-alt"></i>
                    <h2>Politique de Confidentialité</h2>
                </div>
            </a>
        </section>

        <section id="allde">
            <a href="index.php?controller=connexion">
            <div class="setting-item">
                <i class="fas fa-sign-out-alt"></i>
                <h2>Déconnexion</h2>
            </div>
        </section>
    </main>




<?php 
$src1 = "";
$src2 = "";
require 'view_fin.php';
?>
         
    
