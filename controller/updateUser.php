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
    require("../view/vueUpdateUser.php"); 


  /*-----------------------------------------------------
                        CONTROLLER:
   -----------------------------------------------------*/
  //pour protéger connexionUser si déjà connecté
  if(!isset($_SESSION["user"])){

    //Redirection vers page login si non connecté
    header("Location: ../controller/logUser.php");
    exit;

  } else {

    //On vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
      //le formulaire a été envoyé

      //on vérifie que tous les champs sont remplis
      if(isset($_POST["id_user"]) && isset($_POST["name_user"]) && isset($_POST["first_name_user"]) && isset($_POST["email_user"]) && isset($_POST["mdp_user"]) && isset($_POST["confirm_mdp"])
      && !empty($_POST["id_user"]) && !empty($_POST["name_user"]) && !empty($_POST["first_name_user"]) && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"]) && !empty($_POST["confirm_mdp"])){
        //Le formulaire est complet

        //Contrôle longueur mot de passe
        if(strlen($_POST["mdp_user"])<8){

          die ("<p>Veuillez saisir un mot de passe comportant au moins 8 caractères.</p>");

        } else if($_POST["mdp_user"]!=$_POST["confirm_mdp"]){

          die("<p>Les mots de passe saisis ne correspondent pas</p>");

        }
        
        //On va hasher le mdp (algo de hashage BCRYPT (60 caractères) et non de chiffrement comme avec du md5 (obsolète et réversible)).
        $mdp_user = password_hash($_POST["mdp_user"], PASSWORD_BCRYPT);

        //On enregistre le mdp hashé en bdd
        require_once "../utils/connexionBdd.php"; 

        //On créé un objet 
        $userToUpdate = new UserBean();
        $userToUpdate->setIdUser($_POST["id_user"]);
        $userToUpdate->setNameUser($_POST["name_user"]);
        $userToUpdate->setFirstNameUser($_POST["first_name_user"]);
        $userToUpdate->setEmailUser($_POST["email_user"]);
        $userToUpdate->setMdpUser($mdp_user);

        $userToUpdate->updateUser($bdd);
          
        //Ici l'email et le mdp sont OK   
        
        
    

      } else {

        die("<p>Le formulaire n'est pas incomplet</p>");
      }
    }
  }
?>