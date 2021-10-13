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
    require("../utils/connexionBdd.php");
    
    /*-----------------------------------------------------
    Tests :
    -----------------------------------------------------*/
    
    
    //Redirection vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){

        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "Veuillez vous connecter";</script>';
        header("Location: ../view/vueLogUser.php");
        
    } else {      
        
        //création d'une instance d'objet ReservBean 
        $reserv = new ReservBean();        
        //Récupération de l'id de l'utilisateur
        $reserv->setIdUserRes($_SESSION["user"]["id_user"]);
        //Appel méthode de création d'une réservation
        $allResByUser = $reserv->showReserv($bdd);

        //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
        require("../view/vueReservList.php"); 
    }