<?php

    class OrderBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_order;
        private $date_order;
        private $nb_people;
        private $confirmed_order;
        private $id_user;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($date_order, $nb_people, $confirmed_order, $id_user){   
            $this->date_order = $date_order;
            $this->nb_people = $nb_people;
            $this->confirmed_order = $confirmed_order;
            $this->id_user = $id_user;
        }

        /*----------------------------------------------------
                        Getter & Setter :
        -----------------------------------------------------*/

        //id_order Getter & Setter
        public function getIdOrder(){
            return $this->id_order;
        }

        public function setIdOrder($newIdOrder){
            $this->date_order = $newIdOrder;
        }

        //nb_people Getter & Setter
        public function getNbPeople(){
            return $this->nb_people;
        }

        public function setNbPeople($newNbPeople){
            $this->nb_people = $newNbPeople;
        }

        //confirmed_order Getter & Setter
        public function getConfirmedOrder(){
            return $this->confirmed_order;
        }

        public function setConfirmedOrder($newConfirmedOrder){
            $this->confirmed_order = $newConfirmedOrder;
        }

         
        /* //id_user Getter & Setter
        public function getIdUser(){
            return $this->id_user;
        }

        public function setIdUser($newIdUser){
            $this->id_user = $newIdUser;
        } */



    }







?>