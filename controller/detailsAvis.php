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

  } else {
    $_SESSION["erreur"] = "URL invalide";
    header("Location: ../controller/showAvis.php");
  }

  //appel de la vue
  include ("../view/vueDetailsAvis.php");


?>
