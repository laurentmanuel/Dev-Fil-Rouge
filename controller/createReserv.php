<?php

    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();

    /*-----------------------------------------------------
                        Imports :
    -----------------------------------------------------*/ 
    
    //appel de la classe OrderBean
    require("../model/ReservBean.php");

    //ajout du fichier de connexion 
    include("../utils/connexionBdd.php");
    
    //import de la vue view_add_user.php (formulaire d'insertion d'un utilisateur)
    include("../view/vueReservPost.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){    
    
        header("Location: ../view/vueLogUser.php");
    } else {

        //On vérifie si le formulaire a été envoyé
        if(!empty($_POST)){
            //le formulaire a été envoyé

            //Vérif si tous les champs sont complets
            if(isset($_POST["date_reserv"]) && isset($_POST["nb_people"]) && !empty($_POST["date_reserv"]) && !empty($_POST["nb_people"])) {                  
            
                $currentDate = date_create("now")->format("Y-m-d H:i:s"); //pour empêcher de sélectionner une date antérieure à la date du jour
                if($_POST["date_reserv"]<$currentDate){
                    
                    //pour empêcher saisie date incorrecte
                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "Date incorrecte";</script>';                
                } else if ($_POST["nb_people"]<1){

                    //pour empêcher mauvaise saisie du nombre de personnes
                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "Nombre de personnes incorrect";</script>';
                } else {
             
                    //création d'une instance d'objet OrderBean depuis les valeurs du formulaire
                    $reserv = new ReservBean();
                    $reserv->setDateReserv($_POST["date_reserv"]);
                    $reserv->setNbPeople($_POST["nb_people"]);
                    
                    //Récupération de l'id de l'utilisateur
                    $reserv->setIdUserRes($_SESSION["user"]["id_user"]);

                    //Appel méthode de création d'une réservation
                    $reserv->createReserv($bdd);
                    echo '<script>let message = document.querySelector(".okMssg");';
                    echo 'message.innerHTML = "Réservation pour '.$_POST["nb_people"].' personne(s) confirmée pour le '.$_POST["date_reserv"].'";</script>';
                }

            } else {
                echo '<script>let message = document.querySelector(".errMssg");';
                echo 'message.innerHTML = "Le formulaire est incomplet";</script>';
            }

        } else {

            echo '<script>let message = document.querySelector(".errMssg");';
            echo 'message.innerHTML = "Le formulaire est vide";</script>';
        }
    }
