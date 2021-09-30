<?php

use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class UserBean{ 
         
        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_user;
        private $name_user;
        private $first_name_user;
        private $email_user;
        private $mdp_user;
        private $is_admin = 0; //attribut false par défaut


        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct(){
            //$is_admin n'est pas dans le constructeur car on garde la paramètre par défaut
        }


        /*-----------------------------------------------------
                        Getter & Setter : (pour respect du principe d'encapsulation)
        -----------------------------------------------------*/

        //id_user Getter & Setter
        public function getIdUser(){
            return $this->id_user;
        }

        public function setIdUser($newIdUser){
            $this->id_user = $newIdUser;
        }

        //name_user Getter & Setter
        public function getNameUser(){
            return $this->name_user;
        }

        public function setNameUser($newNameUser){
            $this->name_user = $newNameUser;
        }

        //first_name_user Getter & Setter
        public function getFirstNameUser(){
            return $this->first_name_user;
        }

        public function setFirstNameUser($newFirstNameUser){
            $this->first_name_user = $newFirstNameUser;
        }

        //login_user Getter & Setter
        public function getEmailUser(){
            return $this->email_user;
        }

        public function setEmailUser($newEmailUser){
            $this->email_user = $newEmailUser;
        }

        //mdp_user Getter & Setter
        public function getMdpUser(){
            return $this->mdp_user;
        }

        public function setMdpUser($newMdpUser){
            $this->mdp_user = $newMdpUser;
        }


        //is_admin Getter & Setter

        public function getIsAdmin(){
            return $this->is_admin;
        }

        public function setIsAdmin($newIsAdmin){
            $this->is_admin = $newIsAdmin;
        }


        /*-----------------------------------------------------
                            Fonctions :
        -----------------------------------------------------*/


        //méthode ajout d'un utilisateur en bdd
        public function createUser($bdd){

            //récupération des valeurs de l'objet
            $name_user = $this->getNameUser();
            $first_name_user = $this->getFirstNameUser();
            $email_user = $this->getEmailUser();
            $mdp_user = $this->getMdpUser();
            $is_admin = $this->getIsAdmin();

            try{
               
                //requête sql pour création d'un utilisateur
                $sql = "INSERT INTO users(name_user, first_name_user, email_user, mdp_user, is_admin) VALUES
                (:name_user, :first_name_user, :email_user, :mdp_user, :is_admin)"; 

                //Création de la requête préparée pour protéger des injections SQL (et améliorer les perfs dans le cas de requêtes exécutées plusieurs fois dans la même session)
                $query = $bdd->prepare($sql);
                
                //éxécution de la requête SQL
                $query->execute(array(
                    "name_user" => $name_user,
                    "first_name_user" => $first_name_user,
                    "email_user" => $email_user,
                    "mdp_user" => $mdp_user,
                    "is_admin" => $is_admin
                ));

                //On récupère l'id du nouvel utilisateur
                $id_user = $bdd->lastInsertId();
        
                //Message de confirmation de création du compte
                $message = '<p>Le compte utilisateur <span>'.$_POST['first_name_user'].'</span> <span>'.$_POST['name_user'].'</span> a été créé!</p>';

                //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
                $_SESSION["user"] = [
                "id_user" => $id_user, //Récupéré grâce à lastInsertId()
                "name_user" => $name_user,
                "first_name_user" => $first_name_user,
                "email_user" => $email_user,
                "is_admin" => $is_admin,
                "message" => $message
                ];
                
                //On redirige vers la page profil.php une fois le compte créé 
                header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500
                        
            } catch(Exception $e) {

                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }        
        }



        /****************************************************************/

        //méthode pour vérifier si un utilisateur existe dans la bdd
        public function userExists($bdd): bool{

            //récupération des valeurs de l'objet       
            $email_user = $this->getEmailUser();  

            try{                   

                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $sql = "SELECT * FROM users WHERE email_user = :email_user";

                $query = $bdd->prepare($sql);

                //$query->bindValue;
                $query->bindValue(":email_user", $email_user, PDO::PARAM_STR);//falcultatif, paramètre String par défaut
                $query->execute();
                
                //On stocke dans user le résultat de la requête
                $user = $query->fetch();
                
                if(!$user){

                    //Ici l'utilisateur n'existe pas
                    return false;
                } else {
                    
                    //Ici l'utilisateur existe
                    return true;
                }

            } catch(Exception $e) {

                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }        
        }

    /****************************************************************/

        public function logUser($bdd){

            $email_user = $this->getEmailUser();
            $mdp_user = $this->getMdpUser();
            
            try{ 
                //Reqûete Sql
                $sql = "SELECT * FROM users WHERE email_user = :email_user";
      
                $query = $bdd->prepare($sql);
      
                //$query->bindValue;
                $query->bindValue(":email_user", $email_user, PDO::PARAM_STR);//falcultatif, il s'agit d'un paramètre par défaut
                $query->execute();      
                $user = $query->fetch();

                //Ici l'utilisateur est déjà crée dans la bdd, on doit vérfier le hash du mdp
                if(!password_verify($mdp_user, $user["mdp_user"])){
                
                    die("<p>L'email et/ou le mot de passe est incorrect</p>");  

                } else {
                    $message = "<p>Vous êtes connecté!</p>"; 
      
                    //Ici l'email et le mdp sont OK      
                    //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
                        $_SESSION["user"] = [
                            "id_user" => $user["id_user"],
                            "name_user" => $user["name_user"],
                            "first_name_user" => $user["first_name_user"],
                            "email_user" => $user["email_user"],
                            "is_admin" => $user["is_admin"],
                            "message" => $user["message"]
                        ];
      
                }

            } catch(Exception $e) {

                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }   
        
    /****************************************************************/

        public function createSession($bdd){
            
            //récupération des valeurs de l'objet       
            $email_user = $this->getEmailUser();        
            $mdp_user = $this->getMdpUser();  
            
            try{
                
                //Reqûete Sql
                $sql = "SELECT * FROM users WHERE email_user = :email_user";
                
                $query = $bdd->prepare($sql);
                
                //$query->bindValue;
                $query->bindValue(":email_user", $email_user, PDO::PARAM_STR);//falcultatif, il s'agit d'un paramètre par défaut
                $query->execute();      
                $user = $query->fetch();
                
                //Ici l'utilisateur est déjà crée dans la bdd, on doit vérfier le hash du mdp
                if(!password_verify($mdp_user, $user["mdp_user"])){
                    
                    die("<p>L'email et/ou le mot de passe est incorrect</p>");      
                } else {
                    
                    //Ici l'email et le mdp sont OK      
                    $message = '<p>Vous êtes connecté!</p>'; 
                    
                    //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
                    $_SESSION["user"] = [
                        "id_user" => $user["id_user"],
                        "name_user" => $user["name_user"],
                        "first_name_user" => $user["first_name_user"],
                        "email_user" => $user["email_user"],
                        "message" => $message,
                        "is_admin" => $user["is_admin"]
                    ];
                }
                
            } catch(Exception $e) {
                
                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }


    /****************************************************************/
    
        public function updateUser($bdd){
            $name_user = $this->getNameUser();
            $first_name_user = $this->getFirstNameUser();
            $email_user = $this->getEmailUser();
            $mdp_user = $this->getMdpUser();
            $id_user = $this->getIdUser();               

            try{
                $sql = "UPDATE users SET name_user = :name_user, first_name_user = :first_name_user, mdp_user = :mdp_user WHERE email_user = :email_user AND id_user = :id_user";

                $query = $bdd->prepare($sql);
                $query->execute(array(
                    "id_user" => $id_user,
                    "name_user" => $name_user,
                    "first_name_user" => $first_name_user,
                    "email_user" => $email_user,
                    "mdp_user" => $mdp_user
                    ));

            } catch(Exception $e) {
                                
                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }

        }
    
        public function deleteUser($bdd){
    
        
        }
    }
    
    ?>