<?php 

  session_start();

  //appel de la classe AvisBean
  require("../model/AvisBean.php");
  
  //ajout du fichier de connexion 
  require("../utils/connexionBdd.php");
  
  //Vérif si "id_user" existe bien dans l'url
  if(isset($_GET["id_avis"]) && !empty($_GET["id_avis"])){

    //on retire les caractères non souhaités
    $id_avis = strip_tags($_GET["id_avis"]);
    $avis = new AvisBean();
    $avis->setIdAvis($id_avis);
    $avis->setIdUserAvis($_SESSION["user"]["id_user"]);
    
    if($avis->deleteAvis($bdd)==true){

    $_SESSION["message"] = "L'avis a bien été supprimé!";
    //redirection vers liste d'avis avec refresh
    $location = "../controller/readAvis.php";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
    }

  } 
