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
    
    //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
    include("../view/vueReservList.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){        
        header("Location: ../view/vueLogin.php");

    } else {    
        
        $reserv = new ReservBean("","","","");
        //$reserv->setDateReserv($_POST["date_reserv"]);
        //$reserv->setNbPeople($_POST["nb_people"]);
        //Récupération de l'id de l'utilisateur
        $reserv->setIdUser($_SESSION["user"]["id_user"]);
        echo '<p>objet reserv: '.var_dump($reserv).'</p>';
        $reserv->showReserv($bdd);
    }
?>