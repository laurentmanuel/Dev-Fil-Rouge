<?php

    class NewsBean{

        /*---------------------------------------------------
                            Attributs :
        -----------------------------------------------------*/  
        private $id_news;
        private $title_news;
        private $text_news;
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

        //title_news Getter & Setter
        public function geTitleNews(){
            return $this->title_news;
        }

        public function setTitleNews($newTitleNews){
            $this->title_news = $newTitleNews;
        }

        //text_news Getter & Setter
        public function getTextNews(){
            return $this->text_news;
        }

        public function setTextNews($newTextNews){
            $this->text_news = $newTextNews;
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
