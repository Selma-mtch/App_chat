<?php

class Model {
    /**
     * Attribut contenant l'instance PDO
     */
    private $bd;

    /**
     * Attribut statique qui contiendra l'unique instance de Model
     */
    private static $instance = null;

    /**
     * Constructeur : effectue la connexion à la base de données.
     */
    public function __construct()
    {
        try{
        $this->bd= new PDO('mysql:host=localhost;dbname=appli', 'root');
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->bd->query("SET NAMES 'utf8'");
        }catch(PDOException $e){
            die("Erreur de connexion à la base de données: ". $e->getMessage());
        }
    }

    /**
     * Méthode permettant de récupérer un modèle car le constructeur est privé (Implémentation du Design Pattern Singleton)
    */
    public static function getModel()
    {
        if (self::$instance === null) {
            self::$instance = new Model();
        }
        return self::$instance;
    }

    //verifie si l'utilisateur existe renvoie faux si 
    public function userExists($email) 
    {
        // Préparation de la requête pour récupérer l'utilisateur et le mot de passe
        $query = $this->bd->prepare('SELECT mail, pswd, pseudo FROM Usera WHERE mail = :mail');
        $query->execute([
            ':mail' => $email // On peut passer directement $email sans htmlspecialchars car déjà verifié dans la méthode execute
        ]);
    
        // Récupérer l'utilisateur
        return $user= $query->fetch(); 
    }
/**
     * Ajoute un utilsateur passé en paramètre dans la base de données.
     * @return [boolean] retourne true si la personne a été ajoutée dans la base de données, et false sinon
     */
    public function addUser($infos)
    {
        //Préparation de la requête
        $requete = $this->bd->prepare('INSERT INTO Usera (pseudo, genre, mail, pswd) VALUES (:pseudo, :genre, :mail, :pswd)');

        //Remplacement des marqueurs de place par les valeurs
        $marqueurs = ['pseudo', 'genre', 'mail', 'pswd'];
        foreach ($marqueurs as $value) {
            $requete->bindValue(':' . $value, $infos[$value]);
        }

        //Exécution de la requête
        $requete->execute();

        return (bool) $requete->rowCount();
    }

    public function checkUser($email, $password){
        $query = $this->bd->prepare('SELECT * FROM Usera WHERE mail= :mail AND pswd= :pswd');
        $query->execute([
            ':mail'=>$email,
            ':pswd' => $password,
        ]);
        return $query->fetch(PDO::FETCH_ASSOC); // Retourne l'utilisateur ou false
    }

    public function changePseudo($pseudo){
        if (isset($_COOKIE['user_id'])){
            $id = $_COOKIE['user_id'];
            $query = $this->bd->prepare('UPDATE Usera SET pseudo = :pseudo WHERE user_id = :id');
            $query->execute([
                ':id' =>$id,
                ':pseudo' =>$pseudo,
            ]);
            return $query->rowCount() > 0;
        }
    return 'utilisateur introuvable reconnectez vous'; 
    }

    public function checkMdp($mdp){
        $query = $this->bd->prepare('SELECT * FROM Usera WHERE pswd= :pswd');
        $query->execute([
            ':pswd' =>$mdp
        ]);
        return $query->fetch(PDO::FETCH_ASSOC); // Retourne l'utilisateur ou false
    }

    public function changeMdp($actuel, $newmdp){
        $query = $this->bd->prepare('UPDATE Usera SET pswd = :newmdp WHERE pswd = :pswd');
        $query->execute([
            ':newmdp' =>$newmdp,
            ':pswd' =>$actuel,
        ]);
        return $query->rowCount() > 0;
    }

    public function deconnexion(){
        if (isset($_COOKIE['user_id'])){
            $userId = $_COOKIE['user_id'];
            $stmt = $this->bd->prepare("UPDATE Usera SET last_online_at = NOW() WHERE user_id = :user_id");
            $stmt->execute(['user_id' => $userId]);
            return $stmt->rowCount() > 0;
        }
        else{
            return 'Utilisateur non connecté.';
        }
        
        
    }
}
