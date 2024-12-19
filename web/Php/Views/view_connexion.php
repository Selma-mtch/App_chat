<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../css/connexion.css">
    <link rel="stylesheet" href="../css/general.css">
</head>
<body> 
    <h1>PingMe</h1>
    <img src="../img/logo.png" id="logo" alt="Logo de PingMe">
    <h1>Connectez-vous pour commencer !</h1>
    
    <div id="formulaire">

        <form method="GET" action="index.php">
             
            <div>
                <label for="addMail"> <img src="../img/enveloppe.png" alt="Icône enveloppe"/> Adresse mail: </label>
                <input type="text" id="addMail" name="addMail" placeholder="Entrez votre adresse mail" required>
            </div>

            <div>
                <label for="password">  <img src="../img/cadenas.png" alt="Icône cadenas"/> Mot de passe: </label>
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required/>
            </div>

            <div>
                <button id='submit' type="submit" name="action" value="connexion">Valider</button>
            </div>
        </form>

        <?php if (isset($message) && !empty($message)) { ?>
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php }; ?>

    </div>

<p>Pas encore inscrit ? N'attendez plus !</p>
    <a href="inscription.html">M'inscrire</a>
    <a href="index.php?action=inscription">M'inscrire</a>

    <script src="../js/submit.js"></script>

</body>
<footer>  
    &copy; 2024 PingMe. Tous droit réservés.
</footer>
</html>