
<?php 

$titre = "Inscription" ;

$rel1 = "stylesheet";
$href1= "../css/CSS_inscription.css";

$rel2 = "stylesheet";
$href2 = "../css/general.css";

require 'debut.php';

?>

 <h1>Ping Me !</h1>
 <h2>Vous n'êtes toujours pas inscrit ?</h2>
 <h3>Inscriver vous pour commencer !</h2>

    <div id = 'formulaire'>
            <label for="nom"> Prénom: </label>
            <input type="text" id="prenom" name="prenom" class="champs" placeholder="Entrez votre prénom" required>

            <label for="nom"> Nom: </label>
            <input type="text" id="nom" name="nom" class="champs" placeholder="Entrez votre nom" required>


            <label for="pseudo"> <img src ="../img/utilisateur.png"/> Pseudo: </label>
            <input type="text" id="pseudo" name="pseudo" class="champs" placeholder="Entrez votre pseudo " required>
 
            <label for="genre"> <img src ="../img/les-genres.png"/>Genre:</label>
            <select id="genre" name="genre">
                <option value="Option1">Homme</option>
                <option value="Option2">Femme</option>
                <option value="Option3">Dragon</option>
                <option value="Option4">Luciole</option>
                <option value="Option5">Extraterrestre</option>
                <option value="Option6">Autre</option>
            </select>

            <div>
            <label for="email" ><img src ="../img/enveloppe.png"/> Adresse mail:</label>
            <input type="email" id="email" name="email" class="champs" placeholder="Entrez votre adresse email" required>
            </div>
            
            <div>
            <label for="password"> <img src ="../img/cadenas.png"/>Mot de passe:</label>
            <input type="password" id="password" name="password" class="champs" placeholder="Entrez votre mot de passe" required>
            </div>
        
            <div class="rappele">
            <label for="rappele">Se rappeler de moi</label>
            <input type="checkbox" id="rappele"  name="rappele">
            </div>
                

            <div>
            <label for="politique">J'accepte la  <a href="politique.html">politique de confidentialité </a></label>
            <input type="checkbox" id="politique"  name="politique">
            
            </div>

            <button type="submit" id="submit">VALIDER</button>

            

    </div>
   
    <p>Déja inscrit ? <a href="connexion.html">Connectez vous</a> ! </p>   
 
<?php 
$src1 = "../js/inscription.js";
$src2 = "";
require 'fin.php';

?>
     