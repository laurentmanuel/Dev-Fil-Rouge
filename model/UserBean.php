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
        private $is_admin = 0; //attribut false par défaut

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct(){}
    
        /*-----------------------------------------------------
                              Accesseurs: 
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

                //Création de la requête préparée pour protéger des injections SQL 
                //(et améliorer les perfs dans le cas de requêtes exécutées plusieurs fois dans la même session)
                $query = $bdd->prepare($sql);
                
                //éxécution de la requête SQL
                $query->execute(array(
                    "name_user" => $name_user,
                    "first_name_user" => $first_name_user,
                    "email_user" => $email_user,
                    "mdp_user" => $mdp_user,
                    "is_admin" => $is_admin,
                ));
            
                //On récupère l'id du nouvel utilisateur
                $id_user = $bdd->lastInsertId(); 
            
                //On stocke dans $session les infos de l'utilisateur
                $_SESSION["user"] = [
                "id_user" => $id_user, //Récupéré grâce à lastInsertId()
                "name_user" => $name_user,
                "first_name_user" => $first_name_user,
                "email_user" => $email_user,
                "mdp_user" => $mdp_user,
                "is_admin" => $is_admin,
                ];
                $_SESSION["message"];//pour insertion message
                $_SESSION["errorStatus"] = false;//pour affichage du message dans la bonne couleur
                return true;

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
    
    /***************************************************************/
    
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
                    
                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "email ou mot de passe incorrect";</script>';                
                } else {
                
                    //Ici l'email et le mdp sont OK      
                    //On stocke dans $session les infos de l'utilisateur 
                    $_SESSION["user"] = [
                    "id_user" => $user["id_user"],
                    "name_user" => $user["name_user"],
                    "first_name_user" => $user["first_name_user"],
                    "email_user" => $user["email_user"],
                    "mdp_user" => $user["mdp_user"], //ici il s'agit du hash du mdp
                    "is_admin" => $user["is_admin"],                
                    ];
                    $_SESSION["message"];//pour insertion message
                    $_SESSION["errorStatus"] = false;//pour Status
                    return true;
                }
            
            } catch(Exception $e) {
            
                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }   
        
    /***************************************************************/
    
        public function updateUser($bdd){
            $name_user = $this->getNameUser();
            $first_name_user = $this->getFirstNameUser();
            $email_user = $this->getEmailUser();
            $id_user = $this->getIdUser();               
        
            try{
                $sql = "UPDATE users SET name_user = :name_user, first_name_user = :first_name_user, email_user = :email_user WHERE id_user = :id_user";
            
                $user = $bdd->prepare($sql);
                $user->execute(array(
                    "id_user" => $id_user,
                    "name_user" => $name_user,
                    "first_name_user" => $first_name_user,
                    "email_user" => $email_user
                ));
                return true;
            
            } catch(Exception $e) {
                                
                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

    /***************************************************************/
    
        public function updateMdp($bdd){
            $mdp_user = $this->getMdpUser();
            $email_user = $this->getEmailUser();           
        
            try{
                $sql = "UPDATE users SET mdp_user = :mdp_user WHERE email_user = :email_user";
            
                $user = $bdd->prepare($sql);
                $user->execute(array(
                    "mdp_user" => $mdp_user,
                    "email_user" => $email_user
                ));
                return true;
                            
            } catch(Exception $e) {
                                
                //affichage d'une mssg en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    
    /***************************************************************/
    
        public function deleteUser($bdd){
        
        //Récupération id
        $id_user = $this->getIdUser();
        //pour affichage message
        $name_user = $this->getNameUser();
        $first_name_user = $this->getFirstNameUser();
        
            try{
            //requête Suppression réservations
            $sql = "DELETE FROM users WHERE id_user = :id_user";
            
            $query = $bdd->prepare($sql);            
            $query->bindValue(":id_user", $id_user);
            $query->execute();
            return true;

            } catch(Exception $e) {
            
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
            }
        } 
    }
    