<?php

    class NewsBean{

        /*---------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_news;
        private $text_news;
        private $date_news;
        private $id_user;
        private $createdOn;

        /*----------------------------------------------------
                            Constucteur :
        -----------------------------------------------------*/        
        public function __construct(){}

        /*----------------------------------------------------
                            Accesseurs:
        -----------------------------------------------------*/

        //id_news Getter & Setter
        public function getIdNews(){
            return $this->id_news;
        }

        public function setIdNews($newIdNews){
            $this->id_news = $newIdNews;
        }

        //text_news Getter & Setter
        public function getTextNews(){
            return $this->text_news;
        }

        public function setTextNews($newTextNews){
            $this->text_news = $newTextNews;
        }

        //date_news Getter & Setter
        public function getDateNews(){
            return $this->date_news;
        }

        public function setDateNews($newDateNews){
            $this->date_news = $newDateNews;
        }

        //id_user Getter & Setter
        public function getIdUser(){
            return $this->id_user;
        }

        public function setIdUser($newIdUser){
            $this->id_user = $newIdUser;
        }

        //createdOn Getter & Setter
        public function getCreatedOn(){
            return $this->createdOn;
        }

        public function setCreatedOn($newCreatedOn){
            $this->createdOn = $newCreatedOn;
        }

    }
