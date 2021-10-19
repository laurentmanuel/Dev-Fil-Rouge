<?php

  /*----------------------------------------------------
                          SESSION:
  -----------------------------------------------------*/
  
  //On connecte l'utilisateur aprés la création de son compte
  session_start();// on démarre la session php (un cookie se crée à cet instant, la session est un tableau )
  
  /*----------------------------------------------------
            IMPORTS à effectuer pour ajout en bdd:
  -----------------------------------------------------*/

    //appel de la classe UserBean
    require("../model/UserBean.php");

    //appel du fichier de connexion bdd
    require("../utils/connexionBdd.php");

    //appel vue Inscription
    require("../view/vueLogUser.php"); 

  /*-----------------------------------------------------
                        CONTROLLER:
   -----------------------------------------------------*/
  //pour protéger connexionUser si déjà connecté on redirige vers la page"mon compte
  if(isset($_SESSION["user"])){

    header("Location: ../view/vueProfil.php");
    exit;
  } else {

    //On vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
      //le formulaire a été envoyé

      //on vérifie que tous les champs sont remplis
      if(isset($_POST["email_user"], $_POST["mdp_user"])
      && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"])){
        //Le formulaire est complet

        //Filtrage par le Back-end du format email (plus sûr qu'en JS car peut-être js peut être désactivé)
        if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){

          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "L\'adresse email est incorrecte";</script>';
        } 

        //On créé un objet 
        $userToLog = new UserBean();
        $userToLog->setEmailUser($_POST["email_user"]);
        $userToLog->setMdpUser($_POST["mdp_user"]);

        //Vérif sur l'utilisateur est existant
        if($userToLog->userExists($bdd)==false){

          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "Le compte utilisateur n\'existe pas";</script>';
        }
          
        //L'utilisateur existe, on appelle la fonction de login
        if($userToLog->logUser($bdd)==true){

          //insertion message dans session car redirection
          $_SESSION["message"] = "Vous êtes connecté!";
          //Redirection vers page profil
          header("Location: ../view/vueProfil.php");
        } else {

          echo '<script>let message = document.querySelector(".errMssg");';
          echo 'message.innerHTML = "L\'application a rencontré un problème!";</script>';
        }
        
      } else {
        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "Le formulaire est incomplet";</script>';
      }
    
    } else {
      echo '<script>let message = document.querySelector(".errMssg");';
      echo 'message.innerHTML = "Le formulaire est vide";</script>';
    }
  } 

