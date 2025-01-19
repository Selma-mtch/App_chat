<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier mon pseudo</title>
    <link rel="stylesheet" href="../css/pseudo.css">
</head>
<header>
    <section id="header-container">
        <a href="#" onclick="history.back(); return false;">
            <img id="retour" src="../img/retour.webp" alt="Retour">
        </a>
        <h1 id="titre">
            Modifier votre pseudo
        </h1>
    </section>
</header>
<body>
    <div class="container">
        <div class="form-wrapper">
            <i class="fas fa-user fa-3x"></i>
            <h2>Entrer votre nouveau pseudo</h2>
            <form method='POST' action="index.php?controller=changePseudo&action=changePseudo">
                <input type="text" id="nouveauPseudo" name="nouveauPseudo" placeholder="Votre nouveau pseudo">
                <button type="submit"><i class="fas fa-save"></i> Enregistrer</button>
            </form>
        </div>
        

    </div>
    <?php if (isset($message) && !empty($message)): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
</body>
</html>
<?php
$src1 = "";
$src2 = "";
require 'view_fin.php';

?>
