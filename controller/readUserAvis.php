<?php

    //création de la session
    session_start();      
    
    //appel de la classe AvisBean
    require("../model/AvisBean.php");

    //ajout du fichier de connexion 
    require("../utils/connexionBdd.php");
    
    //création d'une instance d'objet 
    if(!isset($_SESSION["user"])){
        header("Location: ../controller/logUser.php");
    } 

    $avis = new AvisBean();
    
    //On mets dans l'instance d'objet avis la valeur de l'id_user
    $avis->setIdUserAvis($_SESSION["user"]["id_user"]);
        
    //Appel méthode 
    $allAvis = $avis->readUserAvis($bdd);

    if($allAvis==null){
        echo ("<p>Aucun avis n'a été publié.</p>");
    }
    
    //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur
    require("../view/vueUserAvis.php");