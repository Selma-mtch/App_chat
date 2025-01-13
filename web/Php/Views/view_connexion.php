<?php 
require 'creer_cookie.php';

$titre = "Connexion" ;

$rel1 = "stylesheet";
$href1= "../css/connexion.css";

$rel2 = "stylesheet";
$href2 = "../css/general.css";

require 'view_debut.php';

?>
    <h1>PingMe</h1>
    <img src="../img/logo.png" id="logo" alt="Logo de PingMe">
    <h1>Connectez-vous pour commencer !</h1>
    
    <div id="formulaire">

        <form method="POST" action="index.php?controller=connexion&action=connexion">
             
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

        <?php if (isset($message) && !empty($message)): ?>
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif ?>

    </div>

<p>Pas encore inscrit ? N'attendez plus !</p>
   <a href="index.php?controller=inscription">M'inscrire</a>

<?php 
$src1 = "../js/submit.js";
$src2 = "";
require 'view_fin.php';
?>
