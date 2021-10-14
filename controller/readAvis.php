<?php

    //création de la session
    session_start();
    
    //appel de la classe AvisBean
    require("../model/AvisBean.php");

    //ajout du fichier de connexion 
    require("../utils/connexionBdd.php");
    
    //création d'une instance d'objet ReservBean 
    $avis = new AvisBean();       

    if(!isset($_SESSION["user"])){

        //Si l'utilisateur n'est pas connecté, on publie tous les avis
        $allAvis = $avis->showAllAvis($bdd); 
        
        //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
        require("../view/vueAvisList.php");

    } else {        
        //On mets dans l'instance d'objet avis la valeur de l'id_user
        $avis->setIdUserAvis($_SESSION["user"]["id_user"]);
        
        //Appel méthode de création d'une réservation
        $allAvis = $avis->showUserAvis($bdd);

        //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur
        require("../view/vueAvisList.php");
    }