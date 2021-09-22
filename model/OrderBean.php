<?php

    class OrderBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_order;
        private $date_order;
        private $nb_people;
        private $id_user;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($date_order, $nb_people){   
            $this->date_order = $date_order;
            $this->nb_people = $nb_people;
            //l'id_user est récupéré grâce à la session php ($_SESSION["user"])
        }

        /*----------------------------------------------------
                        Getter & Setter :
        -----------------------------------------------------*/

        //id_order Getter & Setter
        public function getIdOrder() {
            return $this->id_order;
        }

        public function setIdOrder($newIdOrder) {
            $this->id_order = $newIdOrder;
        }

        //date_order Getter & Setter
        public function getDateOrder(){
            return $this->date_order;
        }

        public function setDateOrder($newDateOrder){
            $this->date_order = $newDateOrder;
        }

        //nb_people Getter & Setter
        public function getNbPeople() {
            return $this->nb_people;
        }

        public function setNbPeople($newNbPeople) {
            $this->nb_people = $newNbPeople;
        }
         
        //id_user Getter & Setter
        public function getIdUser(){
            return $this->id_user;
        }

        public function setIdUser($newIdUser){
            $this->id_user = $newIdUser;
        }

        /*-----------------------------------------------------
                                Fonctions :
        -----------------------------------------------------*/
        //méthode ajout d'une tâche en bdd
        public function createOrder($bdd){  

            //récupération des valeurs de l'objet
            $date_order = $this->getDateOrder();
            $nb_people = $this->getNbPeople();
            $id_user = $this->getIdUser();
            $currentDate = date_create("now")->format("Y-m-d H:i:s");

            //pour empêcher de sélectionner une date antérieure à la date du jour
            if($date_order<$currentDate){

                die("<p>Date incorrecte</p>");
            } else {
            
                try{   
                    //requête ajout d'une tâche
                    $sql = "INSERT INTO orders(date_order, nb_people, id_user) 
                    VALUES (:date_order, :nb_people, :id_user)";

                    $query = $bdd->prepare($sql);

                    //éxécution de la requête SQL
                    $query->execute(array(
                        "date_order" => $date_order,
                        "nb_people" => $nb_people,
                        "id_user" => $id_user
                    ));
                    
                } catch(Exception $e) {
                    //affichage d'une exception en cas d’erreur
                    die('Erreur : '.$e->getMessage());
                }  
            }      
        }




        //méthode affichage de toutes les tâches
        public function showAllOrders($bdd){
            $id_user = $this->getIdUser();

            try {

                $sql = "SELECT * FROM orders WHERE id_user = :id_user ORDER BY updatedOn asc";

                $query = $bdd->prepare($sql);
                $query->bindValue(":id_user", $id_user, PDO::PARAM_STR);
                
                $query->execute();
                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                echo "<p>var dump de result</p>";
                var_dump($result);

            } catch(Exception $e) {

                die('Erreur : '.$e->getMessage());
            }
        }
        
    }

    







?>