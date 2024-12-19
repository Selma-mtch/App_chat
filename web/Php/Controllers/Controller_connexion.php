<?php
require_once "Controller.php";

class Controller_connexion extends Controller
{

    private $model ;

    /**
    * Constructeur
    */
    public function __construct()
    {
        parent::__construct(); // Appelle le constructeur parent
        $this->model = Model::getModel();
    }
    

    /**
     * Action par défaut du contrôleur
     */
    public function action_default(){
        $this->render('connexion');
    }

    /**
     * Action de connexion
     */

    public function action_connexion(){
        $message="";

        //Vérification des champs
        if (isset($_GET['action']) && $_GET['action'] == 'connexion') { //Peut être redondante à enlever ?

            if(isset($_GET['addMail']) && isset($_GET['password']) ){
                
                $email = htmlspecialchars($_GET['addMail']);
                $password = htmlspecialchars($_GET['password']);
                var_dump($email);
                // Validation du format de l'email           
                if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',$email)) {
                    $message= "L'adresse mail n'a pas le bon format.";
                }else{
                    if ($this->model instanceof Model){
                        // Vérification de l'utilisateur dans la base de données
                        $user=$this->model->userExists($email);
                        if ($user) {
                            // Connexion réussie
                            $message= "Connexion réussie. Bienvenue, ".htmlspecialchars($user['pseudo']);
                            
                            // Redirection ou affichage de la page d'accueil
                            $this->render('accueil', ['message' => $message]);
                            return; // Terminer la méthode ici.
                        }else {
                            $message= "Adresse mail ou mot de passe incorrect.";
                        }
                    }else{
                        $message ="Erreur : Le modèle n'est pas correctement initialisé.";
                    }
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }
        }

        // En cas d'échec, reste sur la page de connexion
        $this->render('connexion', ['message' => $message]);
    
    }
}