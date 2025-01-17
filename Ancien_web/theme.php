<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon thème</title>
    <link rel="stylesheet" href="../css/theme.css">
    <script src="../js/theme.js" defer></script>
</head>
<body>
    <header>
        <section id="header-container">
            <a href="#" onclick="history.back(); return false;">
                <img id="retour" src="../img/retour.webp" alt="Retour">
            </a>
            <h1 id="titre">
                Modifier le thème
            </h1>
        </section>
    </header>
    <main>
        <section class="rond">
            <div id="rond_blanc" onclick="changeTheme('blanc')"></div>
            <div id="rond_noire" onclick="changeTheme('noir')"></div>
            <div id="rond_bleu" onclick="changeTheme('bleu')"></div>
            <div id="rond_rouge" onclick="changeTheme('rouge')"></div>
            <div id="rond_vert" onclick="changeTheme('vert')"></div>
            <div id="rond_gris" onclick="changeTheme('gris')"></div>
            <div id="rond_violet" onclick="changeTheme('violet')"></div>
            <div id="rond_rose" onclick="changeTheme('rose')"></div>
            <div id="rond_jaune" onclick="changeTheme('jaune')"></div>
            <div id="rond_marron" onclick="changeTheme('marron')"></div>
            <div id="rond_defaut" onclick="changeTheme('defaut')"></div>
        </section>
        <section class="maquette">

        </section>
    </main>
</body>

<?php
$src1 = "";
$src2 = "";
require 'fin.php';

?>