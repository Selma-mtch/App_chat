<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer de mot de passe</title>
    <link rel="stylesheet" href="../css/changemdp.css">
</head>
<body>
    <header>
        <section id="header-container">
            <a href="#" onclick="history.back(); return false;">
                <img id="retour" src="../img/retour.webp" alt="Retour">
            </a>
            <h1 id="titre">Changer de mot de passe</h1>
        </section>
    </header>
    
    <main class="form-container">
        <div class="form-wrapper">
            <h1>Changer votre mot de passe</h1>
            <form action="#" method="POST">
                <input type="password" name="current-password" placeholder="Mot de passe actuel" required>
                <input type="password" name="new-password" placeholder="Nouveau mot de passe" required>
                <input type="password" name="confirm-password" placeholder="Confirmer le nouveau mot de passe" required>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
        <?php if (isset($message) && !empty($message)): ?>
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif ?>
    </main>
</body>
</html>

<?php
$src1 = "";
$src2 = "";
require 'fin.php';

?>
 
