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
    $avisDetail = new AvisBean();
    $avisDetail->setIdAvis($id_avis);
    $detailsAvis = $avisDetail->getAvis($bdd);

    //appel de la vue
    require("../view/vueAvisUpdate.php");

  } else {

      $_SESSION["message"] = "URL invalide";
  }
  //Vérif si tous les champs sont complets
  if(isset($_POST["id_avis"]) && isset($_POST["note"]) && isset($_POST["title_avis"]) && isset($_POST["comments"])
  && !empty($_POST["note"]) && !empty($_POST["title_avis"]) && !empty($_POST["comments"]) && !empty($_POST["id_avis"])){  
             
      $id_avis = htmlspecialchars($_POST["id_avis"]);
      $updatedAvis = new AvisBean();
      $updatedAvis->setIdAvis($id_avis);
      $updatedAvis->setNote($_POST["note"]);
      $updatedAvis->setTitleAvis($_POST["title_avis"]);
      $updatedAvis->setComments($_POST["comments"]);
      $updatedAvis->setIdUserAvis($_SESSION["user"]["id_user"]);
      
      //Appel méthode updateAvis
      $updatedAvis->updateAvis($bdd);
      //Rechargement de la page
      header('Location: ../controller/updateAvis.php?id_avis='. $updatedAvis->getIdAvis() .'');

      echo '<p>'.$_SESSION["user"]["first_name_user"].', votre avis a bien été modifié!</p></div>';
        
  } else {
    echo "<p>Le formulaire est incomplet</p>";
  }

?>
