<?php

    class AvisBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_avis;
        private $note;
        private $title_avis;
        private $comments;
        private $id_user;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($note, $title_avis, $comments){
            $this->note = $note;
            $this->title_avis = $title_avis;
            $this->comments = $comments;
            //l'id_user est récupéré grâce à la session php ($_SESSION["user"])
        }

        /*----------------------------------------------------
                            Getter & Setter :
        -----------------------------------------------------*/

        //id_avis Getter & Setter
        public function getIdAvis(){
            return $this->id_avis;
        }

        public function setIdAvis($newIdAvis){
            $this->id_avis = $newIdAvis;
        }

        //note Getter & Setter
        public function getNote(){
            return $this->note;
        }

        public function setNote($newNote){
            $this->note = $newNote;
        }

        //title_avis Getter & Setter
        public function getTitleAvis(){
            return $this->title_avis;
        }

        public function setTitleAvis($newTitleAvis){
            $this->title_avis = $newTitleAvis;
        }

        //comments Getter & Setter
        public function getComments(){
            return $this->comments;
        }

        public function setComments($newComments){
            $this->comments = $newComments;
        }

        //id_user Getter & Setter
        public function getIdUserAvis(){
            return $this->id_user;
        }

        public function setIdUserAvis($newIdUser){
            $this->id_user = $newIdUser;
        }
    }







?>