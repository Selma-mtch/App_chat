<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer de mot de passe</title>
    <link rel="stylesheet" href="../css/changemdp.css">
</head>
<header>
    <section id="header-container">
        <a href="#" onclick="history.back(); return false;">
            <img id="retour" src="../img/retour.webp" alt="Retour">
        </a>
        <h1 id="titre">
            Changer de mot de passe
        </h1>
    </section>
</header>
<body>
    <div class="container">
        <div class="form-wrapper">
            <i class="fas fa-lock fa-3x"></i>
            <h2>Entrer votre mot de passe actuel et nouveau</h2>
            <form method='POST' action="index.php?controller=changemdp&action=changemdp">
                <input type="password" name="current-password" placeholder="Mot de passe actuel" required>
                <input type="password" name="new-password" placeholder="Nouveau mot de passe" required>
                <input type="password" name="confirm-password" placeholder="Confirmer le mot de passe" required>
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
