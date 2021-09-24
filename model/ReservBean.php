<?php

    class ReservBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_reserv;
        private $date_reserv;
        private $nb_people;
        private $id_user;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($date_reserv, $nb_people){   
            $this->date_reserv = $date_reserv;
            $this->nb_people = $nb_people;
            //l'id_user est récupéré grâce à la session php ($_SESSION["user"])
        }

        /*----------------------------------------------------
                        Getter & Setter :
        -----------------------------------------------------*/

        //id_order Getter & Setter
        public function getIdReserv() {
            return $this->id_reserv;
        }

        public function setIdReserv($newIdReserv) {
            $this->id_reserv = $newIdReserv;
        }

        //date_order Getter & Setter
        public function getDateReserv(){
            return $this->date_reserv;
        }

        public function setDateReserv($newDateReserv){
            $this->date_reserv = $newDateReserv;
        }

        //nb_people Getter & Setter
        public function getNbPeople() {
            return $this->nb_people;
        }

        public function setNbPeople($newNbPeople) {
            $this->nb_people = $newNbPeople;
        }
         
        //id_user Getter & Setter
        public function getIdUserRes(){
            return $this->id_user;
        }

        public function setIdUserRes($newIdUser){
            $this->id_user = $newIdUser;
        }

        /*-----------------------------------------------------
                                Fonctions :
        -----------------------------------------------------*/
        //méthode ajout d'une tâche en bdd
        public function createReserv($bdd){  

            //récupération des valeurs de l'objet
            $date_reserv = $this->getDateReserv();
            $nb_people = $this->getNbPeople();
            $id_user = $this->getIdUserRes();
            $currentDate = date_create("now")->format("Y-m-d H:i:s");

            //pour empêcher de sélectionner une date antérieure à la date du jour
            if($date_reserv<$currentDate){

                die("<p>Date incorrecte</p>");
            } else {
            
                try{   
                    //requête ajout d'une tâche
                    $sql = "INSERT INTO reservations(date_reserv, nb_people, id_user) 
                    VALUES (:date_reserv, :nb_people, :id_user)";

                    $query = $bdd->prepare($sql);

                    //éxécution de la requête SQL
                    $query->execute(array(
                        "date_reserv" => $date_reserv,
                        "nb_people" => $nb_people,
                        "id_user" => $id_user
                    ));
                    
                } catch(Exception $e) {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }  
            }      
        }


    /****************************************************************/

        //méthode affichage de toutes les tâches
        public function showReserv($bdd){
            $id_user = $this->getIdUserRes();

            try {
              //$sql = "SELECT * FROM reservations WHERE id_user = :id_user";              
              $sql = "SELECT * FROM reservations";              
            
              $query = $bdd->prepare($sql);
              //$query->bindValue(":id_user", $id_user);
              //$query->execute();
              //$query->execute(array("id_user"=>$id_user));
              $result = $query->fetchAll();
            
            } catch (Exception $e) {
              die('Erreur: ' . $e->getMessage());
            }
        }

    

    /****************************************************************/
        //METHODE A TESTER (DOIT FONCTIONNER SAUF REDIRECTION???)
        public function updateReserv($bdd){    

            //récupération des valeurs de l'objet
            $id_reserv = $this->getIdReserv();
            $date_reserv = $this->getDateReserv();
            $nb_people = $this->getNbPeople();
            $id_user = $this->getIdUserRes();

            try{   

                //requête update Réservations
                $sql = "UPDATE reservations SET date_reserv = :date_reserv, nb_people = :nb_people, id_user = :id_user
                WHERE id_reserv = :id_reserv";

                $query = $bdd->prepare($sql);

                //éxécution de la requête SQL
                $query->execute(array(
                'id_reserv' => $id_reserv,   
                'date_reserv' => $date_reserv,
                'nb_people' => $nb_people,
                'id_user' => $id_user
                ));

                //redirection vers show_task.php
                header("Location: ..view/vueReservList.php");
                //header("Location: ..view/vueReservList.php?updateReserv=true&id_user=$id_user");  A TESTER

            }catch(Exception $e){

                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            } 
        }
        

    /****************************************************************/

        public function deleteReserv($bdd){

            //récupération des valeurs de l'objet
            $id_reserv = $this->getIdReserv();
            $id_user = $this->getIdUserRes();
            $date_reserv = $this->getDateReserv();

            try{

                //requête Suppression réservations
                $sql = "DELETE FROM reservations WHERE id_reserv = :id_reserv AND id_user = :id_user";

                $query = $bdd->prepare($sql);

                //éxécution de la requête SQL
                $query->execute(array(
                "id_reserv" => $id_reserv,
                "id_user" => $id_user
                ));

                //message confirmation suppression
                echo '<p>La réservation n°'.$id_reserv.' en date du '.$date_reserv.' a été supprimée</p>';

            }catch(Exception $e){

                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
            } 

        }       
    
    }
?>