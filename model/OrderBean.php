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
        public function getIdOrder(){
            return $this->id_order;
        }

        public function setIdOrder($newIdOrder){
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
        public function getNbPeople(){
            return $this->nb_people;
        }

        public function setNbPeople($newNbPeople){
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
            //récuparation des valeurs de l'objet
            $date_order = $this->getDateOrder();
            $nb_people = $this->getNbPeople();
            $id_user = $this->getIdUser();

                try{   
                    //requête ajout d'une tâche
                    $sql = 'INSERT INTO orders(date_order, nb_people, id_user) 
                    VALUES (:date_order, :nb_people, :id_user]';

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









        

        //méthode affichage de toutes les tâches
        public function showAllTask($bdd)
        {
            try
            {
                $reponse = $bdd->query('SELECT id_task, name_task, date_task FROM task WHERE validate_task=0');
                //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
                while ($donnees = $reponse->fetch())
                {   //affichage du contenu de la requete
                    //quand on clique sur un élément du tableau on lance la fonction js openModal2 qui va lancer le popup
                    //et éxécuter la requéte ajax quand on enregistre
                    echo '<tr><td><p><input type="checkbox" name="id_task[]" value="'.$donnees['id_task'].'"/>
                    <a href="#" onclick="openModal('.$donnees['id_task'].')"  
                    id="'.$donnees['id_task'].'">Nom de la tâche : '.$donnees['name_task'].' , 
                    date de fin : '.$donnees['date_task'].'</p></a></td></tr>';                    
                }
            }
            catch(Exception $e)
            {   //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
        //méthode update task (valider une tâche)
        public function validateTask($bdd, $value)
        {
            try
            {
                //requete pour update le statut de la tache = 1 (true)
                $req = $bdd->query('UPDATE task SET validate_task = 1 Where id_task ='.$value.'');
                 //redirection vers show_task.php
                 header("Location: show_task.php");
            }
            catch(Exception $e)
            {   //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
        //méthode affichage des informations d'une tâche
        public function getTask($bdd, $pId)
        {
            try
            {
                $reponse = $bdd->query('SELECT id_task, name_task, content_task, date_task, cat.id_cat, cat.name_cat FROM task 
                INNER JOIN cat WHERE task.id_cat = cat.id_cat AND id_task='.$pId.'');
                //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
                while ($donnees = $reponse->fetch())
                {   
                    //affichage du contenu d'une tâchedepuis la requête sql
                    echo '<p><input type="text" name ="id_task" value="'.$donnees['id_task'].'"></p>';
                    echo '<p>nom de la tâche :</p>';
                    echo '<p><input type="text" name ="name_task" value="'.$donnees['name_task'].'"></p>';
                    echo '<p>contenu de la  tâche:</p>';
                    echo '<p><textarea name="content_task" rows="5" cols="33">'.$donnees['content_task'].'</textarea></p>';
                    echo '<p>date de fin:</p>';
                    echo '<p><input type="date" name="date_task" value="'.$donnees['date_task'].'"></p>';
                    echo '<p>Type de  tâche:</p>';
                    echo '<p><select name="id_cat">';
                    echo '<p><option value="'.$donnees['id_cat'].'" selected>'.$donnees['name_cat'].'</option></p>';                   
                }
            }
            catch(Exception $e)
            {   //affichage d'une exception
                die('Erreur : '.$e->getMessage());
            }
        }
        //méthode mise à jour d'une tâche
        // public function updatetask($bdd)
        // {    
        //     //récuparation des valeurs de l'objet
        //     $id_task = $this->getIdTask();
        //     $name_task = $this->getNameTask();
        //     $content_task = $this->getContentTask();
        //     $date_task = $this->getDateTask();
        //     $id_user = $this->getIdUserTask();
        //     $id_cat = $this->getIdCat();            
        //     try
        //     {   
        //         //requête SQL mise àjour d'une tâche (update)
        //         $req = $bdd->prepare('UPDATE task SET name_task = :name_task, content_task = :content_task,  date_task = :date_task, validate_task = :validate_task,
        //         id_user = :id_user, id_cat = :id_cat WHERE id_task = :id_task');
        //         //éxécution de la requête SQL
        //         $req->execute(array(
        //         'id_task' => $id_task,   
        //         'name_task' => $name_task,
        //         'content_task' => $content_task,
        //         'date_task' => $date_task,
        //         'validate_task'=> 0,
        //         'id_user' => $id_user,
        //         'id_cat' => $id_cat,
        //     ));
        //         //redirection vers show_task.php
        //         header("Location: show_task.php?update_task=true&idtask=$id_task");
        //     }
        //     catch(Exception $e)
        //     {
        //     //affichage d'une exception en cas d’erreur
        //     die('Erreur : '.$e->getMessage());
        //     } 
        // }

    }







?>