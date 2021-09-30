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

    //Redirection vers page login si pas déjà connecté
    header("Location: ../view/vueLogin.php");
    exit;
  } else {

    //On vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
      //le formulaire a été envoyé

      //on vérifie que tous les champs sont remplis
      if(isset($_POST["mdp_user"]) && !empty($_POST["mdp_user"])){
        //Le formulaire est complet

        //On créé un objet 
        //$user = new UserBean();
        $user->updateUser($bdd);
          
        //Ici l'email et le mdp sont OK   
        
    } else {

        die("<p>Le formulaire est incomplet</p>");
    }
    

    } else {

      die("<p>Le formulaire n'est pas renseigné</p>");
    }
  }


?>