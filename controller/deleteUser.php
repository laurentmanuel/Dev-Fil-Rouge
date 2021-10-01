<?php 

  session_start();

  //appel de la classe AvisBean
  require("../model/UserBean.php");
  
  //ajout du fichier de connexion 
  require("../utils/connexionBdd.php");
  
  require ("../view/vueDeleteUser.php");

  
//pour interdire l'accés à "addUser.php" si déjà connecté (on renvoie vers page "vueProfil.php")
if(!isset($_SESSION["user"])){
    
  header("Location: ../controller/logUser.php");
  exit;

} else {

  //On vérifie si le formulaire a été envoyé
  if(!empty($_POST)){
    //le formulaire a été envoyé
    
    //on vérifie que tous les champs sont remplis
    if(isset($_POST["mdp_user"], $_POST["confirm_mdp"], $_POST["id_user"])
    && !empty($_POST["mdp_user"]) && !empty($_POST["confirm_mdp"]) && !empty($_POST["id_user"])){
      //Le formulaire est complet 

      //Contrôle longueur mot de passe
      if($_POST["mdp_user"]!=$_POST["confirm_mdp"]){

        die("<p>Les mots de passe saisis ne correspondent pas</p>");

      } 

      //création d'un objet depuis les valeurs contenues dans le formulaire
      $user = new UserBean();
      $user->setIdUser($_POST["id_user"]);
      $user->setMdpUser($_POST["mdp_user"]);

      $user->deleteUser($bdd);


      


      header("Location: ../view/vueProfil.php");

      echo "<p>compte supprimé!</p>";

      
    
  } else {

      die("<p>Le formulaire est incomplet</p>"); 
  }

  } else {

    die("<p>Le formulaire n'est pas renseigné</p>"); 
  } 
}

?>
