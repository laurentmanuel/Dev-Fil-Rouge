<?php 

  session_start();

  //appel de la classe AvisBean
  require("../model/ReservBean.php");
  
  //ajout du fichier de connexion 
  require("../utils/connexionBdd.php");
  
  //Vérif si "id_user" existe bien dans l'url
  if(isset($_GET["id_reserv"]) && !empty($_GET["id_reserv"])){

    //on retire les caractères non souhaités
    $id_reserv = strip_tags($_GET["id_reserv"]);
    $reserv = new ReservBean();
    $reserv->setIdReserv($id_reserv);
    $reserv->setIdUserRes($_SESSION["user"]["id_user"]);
    
    if($reserv->deleteRes($bdd)==true){

      $_SESSION["message"] = "La réservation a bien été supprimée!";

      //redirection vers liste d'avis
      $location = "../controller/readReserv.php?id_reserv='. $id_reserv .'";
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
    } else {

      $_SESSION["message"] = "L'application a rencontré une erreur!'";

      //redirection vers liste d'avis
      $location = "../controller/readReserv.php?id_reserv='. $id_reserv .'";
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
    }
  } 
