<?php
require_once "Models/Model.php"; // Inclusion du modèle
require_once "Controller.php";

class Controller_changemdp extends Controller
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

    public function action_changeMdp(){
        $message = '';
        if(isset($_POST['current-password']) && isset($_POST['new-password']) && isset($_POST['confirm-password'])){
            $pswd = htmlspecialchars($_POST['current-password']);
            $newPswd = htmlspecialchars($_POST['new-password']);
            $confPswd = htmlspecialchars($_POST['confirm-password']);
            if (!checkMdp($pswd)){
                $message = 'Mot de passe incorrecte!' ;
                $this->render('changemdp', ['message' => $message]) ;
            }
            else{
                if ($newPswd != $confPswd){
                    $message = 'Les nouveaux Mot de Passe ne sont pas identique.';
                }
                else{
                    $this->model->changeMdp($pswd, $newPswd);
                    $message = 'Vous avez changé votre mot de passe avec succès.';
                    $this->render('changemdp', ['message' => $message]) ;
                }
            }
        }
        else{
            $message = 'Veuillez remplir tout les champs.';
        }
    } 
}
?>
