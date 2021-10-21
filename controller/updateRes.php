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

    echo '<script>let message = document.querySelector(".errMssg");';
    echo 'message.innerHTML = "URL invalide";</script>';
  }

  //Vérif si tous les champs sont complets
  if(isset($_POST["id_reserv"]) && isset($_POST["date_reserv"]) && isset($_POST["nb_people"])
  && !empty($_POST["id_reserv"]) && !empty($_POST["date_reserv"]) && !empty($_POST["nb_people"])){
      
    $currentDate = date_create("now")->format("Y-m-d H:i:s"); //pour empêcher de sélectionner une date antérieure à la date du jour
    if($_POST["date_reserv"]<$currentDate){

        $_SESSION["message"] = "Date incorrecte";
        $_SESSION["errorStatus"] = true;//pour afficher le message dans la bonne couleur
        //Redirection sur page de l'avis concerné (sinon page blanche)
        header('Location: ../controller/updateRes.php?id_reserv='.$_POST['id_reserv'].''); 

    } else if ($_POST["nb_people"]<1){

        //pour empêcher mauvaise saisie du nombre de personnes
        $_SESSION["message"] = "Nombre de personnes incorrect";
        $_SESSION["errorStatus"] = true;//pour afficher le message dans la bonne couleur
        //Redirection sur page de l'avis concerné (sinon page blanche)
        header('Location: ../controller/updateRes.php?id_reserv='.$_POST['id_reserv'].''); 
    } else {
      
      $id_reserv = htmlspecialchars($_POST["id_reserv"]);
      $updatedRes = new ReservBean();
      $updatedRes->setIdReserv($id_reserv);
      $updatedRes->setDateReserv($_POST["date_reserv"]);
      $updatedRes->setNbPeople($_POST["nb_people"]);
      $updatedRes->setIdUserRes($_SESSION["user"]["id_user"]);

      //Appel méthode updateAvis
      if($updatedRes->updateRes($bdd)==true){
        
        //insertion message dans session car redirection
        $_SESSION["message"] = "Votre réservation a bien été modifiée!";
        //Redirection vers page profil
        header("Location: ../controller/updateRes.php?id_reserv=$id_reserv");
        
      } else {
        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "L\'application a rencontré un problème!";</script>';
      }
    } 
  }
