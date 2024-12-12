
<?php 

$titre = "Messagerie" ;
    
$rel1 = "stylesheet";
$href1= "../css/messagerie.css";
    
$rel2 = "";
$href2 = "";
    
require 'debut.php';
    
?>
    <div class="messagerie">
        <div class="barre">
            <div class="nom-groupe">
                <span class="sujet">Groupe: Apprendre à se connaître</span>
            </div>
        </div>

        <div class="boite">
            <div class="ctrle-message">

                
                    <div id="messageDisplayAreaUser" class="message-display">
                        <!-- Les messages de l'utilisateur s'affichent ici -->
                    </div>
                
                    <div id="messageDisplayAreaOther" class="message-display">
                        <!-- Les messages des autres s'affichent ici -->
                    </div>
                

            </div>
        </div>

        <div class="Ecriture">
            <input class="barre-message" type="text" id="messageInput" placeholder="Écrivez votre message"/>
            <button class="envoie" onclick="envoyerMessage()">Envoyer</button>
        </div>
    </div>

<?php 
$src1 = "../js/messagerie.js";
$src2 = "";
require 'fin.php';
?>

   