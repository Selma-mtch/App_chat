<?php
require_once "Models/Model.php"; // Inclusion du modèle
require_once "Controller.php";

class Controller_changePseudo extends Controller
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

    public function action_changePseudo(){
        $message = '';
        if(isset($_POST['addMail']) && isset($_POST['nouveauPseudo']) ){
            $email = htmlspecialchars($_POST['addMail']);
            $pseudo = htmlspecialchars($_POST['nouveauPseudo']);
            if (!$this->model->userExists($email)){
                $message = 'Adresse mail introuvable';
                $this->render('pseudo', ['message' => $message]) ;
            }
            else{
                $this->model->changePseudo($email, $pseudo);
                $message = 'Vous avez changé votre pseudo avec succès.';
                $this->render('pseudo', ['message' => $message]) ;
            }
        }
        else{
            $message = 'veuillez remplir les champs';
        }
    }
}
?>
