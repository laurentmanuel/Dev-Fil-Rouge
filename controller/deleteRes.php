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
    $reserv->deleteRes($bdd);

    //affichage temporaire à gérer
    echo '<script>let message = document.querySelector(".okMssg");';///NE SE VOIT CAR REDIREC, A CORRIGER
    echo 'message.innerHTML = "La réservation a bien été supprimée";</script>';

    header("Location: ../controller/readReserv.php");
    //appel de la vue
    // //redirection vers liste d'avis
    // $location = "../controller/readReserv.php";
    // echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$location.'">';
  } 
