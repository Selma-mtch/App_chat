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

     public function action_connexion() {
        $message = "";
    
        // Vérification des champs
        if (isset($_POST['action']) && $_POST['action'] == 'connexion') {
            if (!empty($_POST['addMail']) && !empty($_POST['password'])) {
                $email = htmlspecialchars($_POST['addMail']);
                $password = htmlspecialchars($_POST['password']);
    
                // Validation du format de l'email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message = "L'adresse mail n'a pas le bon format.";
                } else {
                    // Vérification de l'utilisateur dans la base de données
                    $user = $this->model->userExists($email);
                    $verif_pswd=$this->model->checkMdp($email,$password);
    
                     //Si l'utilisateur existe dans la BD et que le mot de passe et correct
                    if ($user && $verif_pswd) {
                        // Connexion réussie
                        //$message = "Connexion réussie. Bienvenue, " . htmlspecialchars($user['pseudo']);
    
                        // Création d'un cookie pour identifier l'utilisateur
                        setcookie("user_id", $user['user_id'], time() + 3600, "/"); // Expire après 1 heure
    
                        // Redirection vers l'accueil
                        header("Location: index.php?controller=accueil");
                        exit;
                    } else {
                        $message = "Adresse mail ou mot de passe incorrect.";
                    }
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }
        }
    
        // Rendre la vue connexion avec le message d'erreur ou succès
        $this->render('connexion', ['message' => $message]);
    }
    
}