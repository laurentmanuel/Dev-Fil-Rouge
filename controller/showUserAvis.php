<?php

    //création de la session
    session_start();      
    
    //appel de la classe AvisBean
    require("../model/AvisBean.php");

    //ajout du fichier de connexion 
    require("../utils/connexionBdd.php");
    
    //création d'une instance d'objet ReservBean 
    $avis = new AvisBean();       

    $id_user = $this->setIdUserAvis($_SESSION["user"]["id_user"]); 
    var_dump($id_user);       
    $userAvis = $avis->showUserAvis($bdd);  
    var_dump($userAvis);  
    
    //import de la vue liste des réservations (formulaire d'insertion d'un utilisateur)
    require("../view/vueUserAvis.php"); 
    
    ?>