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
        //private $role_admin = false; 


        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($name_user, $first_name_user, $email_user, $mdp_user/*, $role_admin*/){   
            $this->name_user = $name_user;
            $this->first_name_user = $first_name_user;
            $this->email_user = $email_user;
            $this->mdp_user = $mdp_user;
            //$this->role_admin = $role_admin;
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

        //role_admin Getter & Setter
       /*public function getRoleAdmin(){
            return $this->role_admin;
        }

        public function setRoleAdmin($newRoleAdmin){
            $this->role_admin = $newRoleAdmin;
        }*/


        /*-----------------------------------------------------
                            Fonctions :
        -----------------------------------------------------*/

        //méthode pour vérifier si un utilisateur existe dans la bdd
        public function isUser($bdd): bool{
        
            //récupération des valeurs de l'objet       
            $email_user = $this->getEmailUser();

            //On vérifie que le format de l'email saisi est correct
            if(!filter_var($email_user, FILTER_VALIDATE_EMAIL)){
                die ("Le format de l'adresse mail saisi n'est pas correct");
            }
        
            try{      

                //requête pour vérifier si l'email est déjà existant
                $sql = "SELECT * FROM `users` WHERE `email_user` = :email_user";
                
                $reponse = $bdd->prepare($sql);

                $reponse->execute(array("email_user" => $email_user));

                //parcours du résultat de la requête
                while($donnees = $reponse->fetch()){
                
                    //return $donnees["mdp_user"];
                    if($email_user == $donnees["email_user"]){
                    
                        //retourne true si l'utilisateur existe déjà en bdd
                        return true;

                    } else {

                        //retourne false si l'utilisateur n'existe pas en bdd
                        return false;
                    }
                }   

            } catch(Exception $e) {

                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }        
        }


        //--------------------------------
        

        //méthode ajout d'un utilisateur en bdd
        public function createUser($bdd){

            //récupération des valeurs de l'objet
            $nameUser = $this->getNameUser();
            $firstNameUser = $this->getFirstNameUser();
            $emailUser = $this->getEmailUser();
            $mdpUser = $this->getMdpUser(); 
            //Gestion des droits à développer
            //$role_admin = $this->getRoleAdmin();

            try{
               
                //requête sql pour création d'un utilisateur
                $sql = "INSERT INTO `users` (`name_user`, `first_name_user`, `email_user`, `mdp_user`) 
                VALUES (:name_user, :first_name_user, :email_user, $mdpUser)"; //ici le mdp est hashé

                //Création de la requête préparée pour protéger des injections SQL (et améliorer les perfs dans le cas de requêtes exécutées plusieurs fois dans la même session)
                $query = $bdd->prepare($sql);
                
                //éxécution de la requête SQL
                $query->execute(array(
                "name_user" => $nameUser,
                "first_name_user" => $firstNameUser,
                "email_user" => $emailUser,
                "mdp_user" => $mdpUser
                //"role_admin" => $role_admin,                                                                
                ));
                
            } catch(Exception $e) {

                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }        
        }




        //--------------------------------

        public function showUser($bdd){

        }

        //--------------------------------

        public function updateUser($bdd){

        }

        

        public function deleteUser($bdd){

        }
    }
?>