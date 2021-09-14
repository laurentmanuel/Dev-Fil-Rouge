<?php
    class AttractionBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_attraction;
        private $name_attraction;
        private $max_people_attraction;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($name_attraction, $max_people_attraction){   
            $this->name_attraction = $name_attraction;
            $this->max_people_attraction = $max_people_attraction;
        }
        
        /*----------------------------------------------------
                        Getter & Setter :
        -----------------------------------------------------*/

        //id_attraction Getter & Setter
        public function getIdAttraction(){
            return $this->id_attraction;
        }

        public function setIdAttraction($newIdAttraction){
            $this->id_attraction = $newIdAttraction;
        }

        //name_attraction Getter & Setter
        public function getNameAttraction(){
            return $this->name_attraction;
        }

        public function setNameAttraction($newNameAttraction){
            $this->name_attraction = $newNameAttraction;
        }

        //max_people_attraction Getter & Setter
        public function getMaxPeopleAttraction(){
            return $this->max_people_attraction;
        }

        public function setMaxPeopleAttraction($newMaxPeopleAttraction){
            $this->max_people_attraction = $newMaxPeopleAttraction;
        }
    }
    
    /* 

    public function createAttraction(){


    }

    public function readAttraction(){


    }

    public function updateAttraction(){

    }

    public function deleteAttraction(){

    }

    public function showAllAttraction(Type $var = null){
        
        # code...
    } */






?>