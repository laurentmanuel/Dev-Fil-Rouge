<?php

    class UserBean{ 
         
        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_user;
        private $name_user;
        private $first_name_user;
        private $email_user;
        private $mdp_user;
        //Gestion des droits à developper
        //private $admin_user = false; 


        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($name_user, $first_name_user, $email_user, $mdp_user/*, $admin_user*/){   
            $this->name_user = $name_user;
            $this->first_name_user = $first_name_user;
            $this->email_user = $email_user;
            $this->mdp_user = $mdp_user;
            //$this->admin_user = $admin_user;
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


        //admin_user Getter & Setter

        // public function getAdminUser(){
        //     return $this->admin_user;
        // }

        // public function setAdminUser($newAdminUser){
        //     $this->admin_user = $newAdminUser;
        // }


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
            //Gestion des droits à développer
            //$admin_user = $this->getAdminUser();

            try{
               
                //requête sql pour création d'un utilisateur
                $sql = "INSERT INTO users(name_user, first_name_user, email_user, mdp_user/*, admin_user*/) VALUES
                (:name_user, :first_name_user, :email_user, :mdp_user/*, :admin_user*/)"; //ici le mdp est hashé //query OK

                //Création de la requête préparée pour protéger des injections SQL (et améliorer les perfs dans le cas de requêtes exécutées plusieurs fois dans la même session)
                $query = $bdd->prepare($sql);
                
                //éxécution de la requête SQL
                $query->execute(array(
                    "name_user" => $name_user,
                    "first_name_user" => $first_name_user,
                    "email_user" => $email_user,
                    "mdp_user" => $mdp_user));
                
            } catch(Exception $e) {

                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }        
        }



        //--------------------------------

        //méthode pour vérifier si un utilisateur existe dans la bdd
        public function userExists($bdd): bool{

            //récupération des valeurs de l'objet       
            $email_user = $this->getEmailUser();  

            try{                   

                //requête pour stocker le contenu de toute la table le contenu est stocké dans le tableau $reponse
                $sql = "SELECT * FROM users WHERE email_user = :email_user";

                $query = $bdd->prepare($sql);

                //$query->bindValue;
                $query->bindValue(":email_user", $email_user, PDO::PARAM_STR);//falcultatif, il s'agit d'un paramètre par défaut
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

        //--------------------------------

        public function logUser($bdd){

            $email_user = $this->getEmailUser();
            $mdp_user = $this->getMdpUser();
            
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
              //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
              $_SESSION["user"] = [
                "id_user" => $user["id_user"],
                "name_user" => $user["name_user"],
                "first_name_user" => $user["first_name_user"],
                "email_user" => $user["email_user"]/*,
                "admin_user" => $user["admin_user"]*/
              ];
      
              //Redirection vers la page profil.php par exemple
              header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500
            }

        }

        //-------------------------------

        public function updateUser($bdd){
            

        }

        

        public function deleteUser($bdd){

        }
    }
   
?>