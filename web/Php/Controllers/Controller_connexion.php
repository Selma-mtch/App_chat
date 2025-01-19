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
        if (isset($_POST['action']) && $_POST['action'] === 'connexion') {
            if (!empty($_POST['addMail']) && !empty($_POST['password'])) {
                $email = htmlspecialchars($_POST['addMail']);
                $password = htmlspecialchars($_POST['password']);

                // Validation du format de l'email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $message = "L'adresse mail n'a pas le bon format.";
                } else {
                    // Vérification de l'existence de l'utilisateur
                    if ($this->model->userExists($email)) {
                        // Vérification du mot de passe
                        if ($this->model->checkMdp($email, $password)) {
                            // Récupération des détails de l'utilisateur
                            $user = $this->model->getUserByEmail($email);

                            // Création du cookie
                            if (setcookie("user_id", $user['user_id'], time() + 3600, "/", "", true, true)) {
                                header("Location: index.php?controller=accueil");
                                exit;
                            } else {
                                $message = "Erreur lors de la création du cookie.";
                            }
                        } else {
                            $message = "Mot de passe incorrect.";
                        }
                    } else {
                        $message = "Adresse mail incorrecte ou utilisateur inexistant.";
                    }
                }
            } else {
                $message = "Veuillez remplir tous les champs.";
            }
        }

        // Rendre la vue connexion avec le message
        $this->render('connexion', ['message' => $message]);
    }
    
}
