<?php
require_once "Models/Model.php"; // Inclusion du modèle
require_once "Controller.php";

class Controller_connexion extends Controller
{

    private $model ;

    /**
    * Constructeur
    */
    public function __construct()
    {
        $this->model =Model::getModel();  // Instancie le modèle
        parent::__construct();
        
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
        if (isset($_POST['action']) && $_POST['action'] == 'connexion') { //Peut être redondante à enlever ?

            if(isset($_POST['addMail']) && isset($_POST['password']) ){
                
                $email = htmlspecialchars($_POST['addMail']);
                $password = htmlspecialchars($_POST['password']);
                // Validation du format de l'email           
                if (!preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',$email)) {
                    $message= "L'adresse mail n'a pas le bon format.";
                }else{
                        // Vérification de l'utilisateur dans la base de données
                        $user=$this->model->userExists($email);
                        if ($user) {
                            // Connexion réussie
                            $message= "Connexion réussie. Bienvenue, ".htmlspecialchars($user['pseudo']);
                            
                            // Redirection ou affichage de la page d'accueil
                            $this->render('accueil', ['message' => $message]);
                          
                            // Terminer la méthode ici.
                        }else {
                            $message= "Adresse mail ou mot de passe incorrect.";
                            // En cas d'échec, reste sur la page de connexion
                            $this->render('connexion', ['message' => $message]);
                        }
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }
        }
        
    
    
    }
}
