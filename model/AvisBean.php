<?php

    class AvisBean{

        /*----------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_avis;
        private $note_attraction;
        private $comment_attraction;
        private $id_attraction;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct($note_attraction, $comment_attraction, $id_attraction){
            $this->note_attraction = $note_attraction;
            $this->comment_attraction = $comment_attraction;
            $this->id_attraction = $id_attraction;
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

        //note_attraction Getter & Setter
        public function getNoteAttraction(){
            return $this->note_attraction;
        }

        public function setNoteAttraction($newNoteAttraction){
            $this->note_attraction = $newNoteAttraction;
        }

        //comment_attraction Getter & Setter
        public function getCommentAttraction(){
            return $this->comment_attraction;
        }

        public function setCommentAttraction($newCommentAttraction){
            $this->comment_attraction = $newCommentAttraction;
        }

        //id_attraction Getter & Setter
        public function getIdAttraction(){
            return $this->id_attraction;
        }

        public function setIdAttraction($newIdAttraction){
            $this->id_attraction = $newIdAttraction;
        }
    }







?>