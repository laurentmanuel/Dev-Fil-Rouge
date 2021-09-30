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
    require("../view/vueLogin.php"); 


  /*-----------------------------------------------------
                        CONTROLLER:
   -----------------------------------------------------*/
  //pour protéger connexionUser si déjà connecté
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
          die ("<p>L'adresse email est incorrecte</p>");

        } else {

          //Le format de l'adresse mail est correcte, on peut donc la stocker dans une variable
          $email_user = $_POST["email_user"];
        } 

        //On créé un objet 
        $userToLog = new UserBean();
        $userToLog->setEmailUser($email_user);
        $userToLog->setMdpUser($_POST["mdp_user"]);

        //Vérif sur l'utilisateur est existant
        if($userToLog->userExists($bdd)==false){
          
          die("<p>Le compte utilisateur n'existe pas, veuillez créer un compte.");
        } else {

          //L'utilisateur existe, on appelle la fonction de login
          $userToLog->logUser($bdd);
        }        
          
          //Ici l'email et le mdp sont OK   
        
      } else {

        die("<p>Le formulaire est incomplet</p>");
      }
    

    } else {

      die("<p>Le formulaire n'est pas renseigné</p>");
    }
  }

?>