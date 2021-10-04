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
    include("../view/vueReservations.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){    
    
        header("Location: ../view/vueLogin.php");
    } else {

        //On vérifie si le formulaire a été envoyé
        if(!empty($_POST)){

            //le formulaire a été envoyé

            //Vérif si tous les champs sont complets
            if(isset($_POST["date_reserv"]) && isset($_POST["nb_people"])){            
             
                //création d'une instance d'objet OrderBean depuis les valeurs du formulaire
                $reserv = new ReservBean();
                $reserv->setDateReserv($_POST["date_reserv"]);
                $reserv->setNbPeople($_POST["nb_people"]);
                
                //Récupération de l'id de l'utilisateur
                $reserv->setIdUserRes($_SESSION["user"]["id_user"]);

                //Appel méthode de création d'une réservation
                $reserv->createReserv($bdd);

                echo '<p>Réservation pour '.$_POST["nb_people"].' personne(s) confirmée pour le '.$_POST["date_reserv"].' </p></div>';    
            
            } else {

                echo "<p>Veuillez compléter les informations manquantes SVP.</p>";
            }

        } else {

            echo "<p>Veuillez sélectionner une date et le nombre de personnes</p>";
        }
    }
?> 