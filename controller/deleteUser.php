<?php 
  
  session_start();

  //appel de la classe AvisBean
  require("../model/UserBean.php");
    //ajout du fichier de connexion 
  require("../utils/connexionBdd.php");
  //Ajout de la vue
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
        
        if(!password_verify($_POST["mdp_user"], $_SESSION["user"]["mdp_user"])){

          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "Mot de passe incorrect";</script>';
        } else if($_POST["mdp_user"]!=$_POST["confirm_mdp"]){

          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "Les mots de passe ne correspondent pas";</script>';
        }

        //création d'un objet depuis les valeurs contenues dans le formulaire
        $user = new UserBean();
        $user->setIdUser($_POST["id_user"]);
        $user->setMdpUser($_POST["mdp_user"]);

        if($user->deleteUser($bdd)==true){

          $_SESSION["message"] = 'L\'utilisateur '.$_SESSION["user"]["first_name_user"].' '.$_SESSION["user"]["name_user"].' a bien été supprimé';

          //Redirection
          header("Location: ../utils/deconnexion.php");
        } else {

          //Insertion message d'erreur
          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "L\'application a rencontré une erreur!";</script>';
        }
      }

    } else {
      echo '<script>let message = document.querySelector(".errMssg");';
      echo 'message.innerHTML = "Le formulaire est incomplet";</script>';
    }
  }
