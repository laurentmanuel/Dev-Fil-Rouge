<?php

    //création de la session
    session_start();

    //appel de la classe AvisBean
    require("../model/AvisBean.php");

    //ajout du fichier de connexion 
    require("../utils/connexionBdd.php");
    
    //création d'une instance d'objet ReservBean 
    $avis = new AvisBean();        
    //Récupération de l'id de l'utilisateur
    $allAvis = $avis->showAllAvis($bdd);
    
    //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
    require("../view/vueAvisList.php"); 
    ?>