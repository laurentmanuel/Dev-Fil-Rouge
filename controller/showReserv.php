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
    
    //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
    require("../view/vueReservList.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){

        echo "<p>Veuillez vous connecter</p>";
        header("Location: ../view/vueLogin.php");

    } else {      

        //création d'une instance d'objet ReservBean 
        $reserv = new ReservBean("","","","");        
        //Récupération de l'id de l'utilisateur
        $reserv->setIdUserRes($_SESSION["user"]["id_user"]);
        //Appel méthode de création d'une réservation
        var_dump($reserv);
        $reserv->showReserv($bdd);
        echo "<p>retour du fetch dans le controller: </p>";
        var_dump($result);


    }
?>