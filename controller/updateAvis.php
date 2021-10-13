<?php 

  session_start();

  //appel de la classe AvisBean
  require("../model/AvisBean.php");
  
  //ajout du fichier de connexion 
  require("../utils/connexionBdd.php");
  
  //Vérif si "id_user" existe bien dans l'url
  if(isset($_GET["id_avis"]) && !empty($_GET["id_avis"])){

    //on retire les caractères non souhaités
    $id_avis = htmlspecialchars($_GET["id_avis"]);
    $avisDetail = new AvisBean();
    $avisDetail->setIdAvis($id_avis);
    $detailsAvis = $avisDetail->getAvis($bdd);

    //appel de la vue
    require("../view/vueUpdateAvis.php");

  } else {
    echo '<script>let message = document.querySelector(".errMssg");';
    echo 'message.innerHTML = "L\'ancien mot de passe est incorrect";</script>';
  }
  
  //Vérif si tous les champs sont complets
  if(isset($_POST["id_avis"]) && isset($_POST["note"]) && isset($_POST["title_avis"]) && isset($_POST["comments"])
  && !empty($_POST["note"]) && !empty($_POST["title_avis"]) && !empty($_POST["comments"]) && !empty($_POST["id_avis"])){  
       
      //on filtre les chamo
      $id_avis = htmlspecialchars($_POST["id_avis"]);
      $title_avis = htmlspecialchars($_POST["title_avis"]);
      $comments = htmlspecialchars($_POST["comments"]);

      $updatedAvis = new AvisBean();
      $updatedAvis->setIdAvis($id_avis);
      $updatedAvis->setNote($_POST["note"]);
      $updatedAvis->setTitleAvis($title_avis);
      $updatedAvis->setComments($comments);
      $updatedAvis->setIdUserAvis($_SESSION["user"]["id_user"]);
      
      //Appel méthode updateAvis
      if($updatedAvis->updateAvis($bdd)==true){

        //Insertion message dans superglobale session car redirection
        $_SESSION["status"] = "Votre Avis a bien été modifié!";
        //Rechargement de la page
        header("Location: ../controller/updateAvis.php?id_avis=$id_avis");
      } else {

        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "L\'application a rencontré un problème!";</script>';
      };       
  } 
