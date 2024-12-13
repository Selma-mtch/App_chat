

<?php 
require 'creer_cookie.php';

$titre = "Connexion" ;

$rel1 = "stylesheet";
$href1= "../css/connexion.css";

$rel2 = "stylesheet";
$href2 = "../css/general.css";

require 'debut.php';

?>
    <h1>PingMe</h1>
    <img src="../img/logo.png" id="logo">
    <h1>Connectez-vous pour commencer !</h1>
    
    <div id="formulaire">

        <form method="POST">
             
            <div>
                <label for="addMail"> <img src="../img/enveloppe.png"/> Adresse mail: </label>
                <input id="addMail" type="text" name="addMail" placeholder="Entrez votre adresse mail" required>
            </div>

            <div>
                <label for="password">  <img src="../img/cadenas.png"/> Mot de passe: </label>
                <input id="password" type="password" name="password" placeholder="Entrez votre mot de passe" required/>
            </div>

            <div>
                <button id='submit' name="submit" type="submit">Valider</button>
            </div>
        </form>
    </div>
    <p>Pas encore inscrit ? N'attendez plus !</p>
    <a href="inscription.html">M'inscrire</a>

<?php 
$src1 = "../js/submit.js";
$src2 = "";
require 'fin.php';

?>

    
