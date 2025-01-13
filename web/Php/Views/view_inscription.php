
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
 <h3>Inscriver vous pour commencer !</h3>

    <div id="formulaire">
      <form method="POST" action="index.php?controller=inscription&action=inscription">
        <!-- Prénom -->
        <label for="prenom"> Prénom: </label>
        <input type="text" id="prenom" name="prenom" class="champs" placeholder="Entrez votre prénom" required>
        <small class="error-message">Veuillez entrer un prénom valide (au moins 2 lettres).</small>
    
        <!-- Nom -->
        <label for="nom"> Nom: </label>
        <input type="text" id="nom" name="nom" class="champs" placeholder="Entrez votre nom" required>
        <small class="error-message">Veuillez entrer un nom valide (au moins 2 lettres).</small>
    
        <!-- Pseudo -->
        <label for="pseudo"> <img src="../img/utilisateur.png" /> Pseudo: </label>
        <input type="text" id="pseudo" name="pseudo" class="champs" placeholder="Entrez votre pseudo " required>
        <small class="error-message">Veuillez entrer un pseudo valide (au moins 3 caractères).</small>
    
        <!-- Genre -->
        <label for="genre"> <img src="../img/les-genres.png" />Genre:</label>
        <select id="genre" name="genre">
            <option value="">Sélectionnez un genre</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Dragon">Dragon</option>
            <option value="Luciole">Luciole</option>
            <option value="Extraterrestre">Extraterrestre</option>
            <option value="Autre">Autre</option>
        </select>
        <small class="error-message">Veuillez sélectionner un genre.</small>

    
        <!-- Email -->
        <label for="email"><img src="../img/enveloppe.png" /> Adresse mail:</label>
        <input type="email" id="email" name="email" class="champs" placeholder="Entrez votre adresse email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}" required>
        <small class="error-message">Veuillez entrer une adresse e-mail valide.</small>
    
        <!-- Mot de passe -->
        <label for="password"> <img src="../img/cadenas.png" />Mot de passe:</label>
        <input type="password" id="password" name="password" class="champs" placeholder="Entrez votre mot de passe" required>
        <small class="error-message">Le mot de passe doit contenir au moins 6 caractères.</small>

        <div class="rappele">
            <label for="rappele">Se rappeler de moi</label>
            <input type="checkbox" id="rappele"  name="rappele">
        </div>

        <?php if (isset($message) && !empty($message)): ?>
        <div class="message">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif ?>
        
    
        <!-- Politique -->
        <div>
            <label for="politique">J'accepte la <a href="politique.php">politique de confidentialité</a></label>
            <input type="checkbox" id="politique" name="politique">
        </div>
    
        <!-- Bouton Valider -->
        <button type="submit" id="submit">VALIDER</button>
      </form>
    </div>
 
     <p>Déja inscrit ? <a href="index.php?controller=connexion&action=connexion">Connectez vous</a> ! </p> 
 
<?php 
$src1 = "../js/inscription.js";
$src2 = "";
require 'fin.php';

?>
     
