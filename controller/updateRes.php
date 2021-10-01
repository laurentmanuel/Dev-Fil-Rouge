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
    $reserv = $reserv->getReserv($bdd);

    //appel de la vue
    require("../view/vueUpdateRes.php");

  } else {

      $_SESSION["message"] = "URL invalide";
  }

  //Vérif si tous les champs sont complets
  if(isset($_POST["id_reserv"]) && isset($_POST["date_reserv"]) && isset($_POST["nb_people"])
  && !empty($_POST["id_reserv"]) && !empty($_POST["date_reserv"]) && !empty($_POST["nb_people"])){
      
        $id_reserv = htmlspecialchars($_POST["id_reserv"]);
        $updatedRes = new ReservBean();
        $updatedRes->setIdReserv($id_reserv);
        $updatedRes->setDateReserv($_POST["date_reserv"]);
        $updatedRes->setNbPeople($_POST["nb_people"]);
        $updatedRes->setIdUserRes($_SESSION["user"]["id_user"]);

        //Appel méthode updateAvis
        $reserv = $updatedRes->updateRes($bdd);

        //Redirection vers la liste des réservations aprés modif
        header('Location: ../controller/showReserv.php?id_reserv='. $updatedRes->getIdReserv() .'');

        //message de confirmation de la modification
        echo '<p>'.$_SESSION["user"]["first_name_user"].', votre réservation a bien été modifiée!</p></div>';
        
  } else {

        echo "<p>Le formulaire est incomplet</p>";
  }

?>
