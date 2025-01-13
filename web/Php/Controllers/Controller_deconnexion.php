<?php
require_once "Models/Model.php"; // Inclusion du modèle
require_once "Controller.php";

class Controller_deconnexion extends Controller
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

    public function action_deconnexion(){
        // Vérifier si le cookie 'user_id' existe
        if (isset($_COOKIE['user_id'])) {

            // enregistre la deconnexion dans la bd (l'heure)
            $this->model->deconnexion();
            
            // Supprimer le cookie en le réinitialisant avec une expiration passée
            setcookie("user_id", "", time() - 3600, "/");

            // Rediriger l'utilisateur vers la page de connexion ou d'accueil
            header("Location: connexion.php");
            exit;
        } else {
            // Si aucun utilisateur n'est connecté, rediriger quand même
            header("Location: connexion.php");
            exit;
        }
    }
}
