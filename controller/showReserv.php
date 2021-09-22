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
    include("../view/vueReservList.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){    
    
        header("Location: ../view/vueLogin.php");

    } else {    
        
        $reserv = new OrderBean();
        $reserv->set

        
        $order->showReserv($bdd);
        
    }
?>