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
    require("../view/vueProfil.php"); 


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
      if(isset($_POST["id_user"]) && isset($_POST["name_user"]) && isset($_POST["first_name_user"]) && isset($_POST["email_user"])
      && !empty($_POST["id_user"]) && !empty($_POST["name_user"]) && !empty($_POST["first_name_user"]) && !empty($_POST["email_user"])){
        //Le formulaire est complet

        //On créé un objet 
        $user = new UserBean();
        $user->setIdUser($_POST["id_user"]);
        $user->setNameUser($_POST["name_user"]);
        $user->setFirstNameUser($_POST["first_name_user"]);
        $user->setEmailUser($_POST["email_user"]);
        
        $user->updateUser($bdd);

        //Mise à jour des valeurs de la session
        $_SESSION["user"] = [
          "id_user" => $user->getIdUser(),
          "name_user" => $user->getNameUser(),
          "first_name_user" => $user->getFirstNameUser(),
          "email_user" => $user->getEmailUser(),
          "is_admin" => $user->getIsAdmin()
        ];

        //refresh
        header("Location: ../controller/updateUser.php");
        echo "<p>Votre profil a été mis à jour</p>";
        
      } else {

        die("<p>Le formulaire n'est pas incomplet</p>");
      }
    }
  }
?>