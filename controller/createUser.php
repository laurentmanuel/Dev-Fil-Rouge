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
    require("../view/vueCreateUser.php"); 

  /*-----------------------------------------------------
                        CONTROLLER:
   -----------------------------------------------------*/

  //pour interdire l'accés à "addUser.php" si déjà connecté (on renvoie vers page "vueProfil.php")
  
  //On vérifie si le formulaire a été envoyé
  if(!empty($_POST)){
    //le formulaire a été envoyé
    
    //on vérifie que tous les champs sont remplis
    if(isset($_POST["name_user"], $_POST["first_name_user"], $_POST["email_user"], $_POST["mdp_user"], $_POST["confirm_mdp"])
    && !empty($_POST["name_user"]) && !empty($_POST["first_name_user"]) && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"]) && !empty($_POST["confirm_mdp"])){
      //Le formulaire est complet

      //On récupère les données en les protégeant
      $name_user = strip_tags($_POST["name_user"]);
      $first_name_user = strip_tags($_POST["first_name_user"]);

      //Filtrage par le Back-end du format email (plus sûr qu'en JS car peut-être js peut être désactivé)
      if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
        
        //Script js pour selection du champ souhaité
        echo '<script>let message = document.querySelector(".errMssg");';
        //script js remplacement du message
        echo 'message.innerHTML = "L\'adresse email est incorrecte";</script>';

      } else {
        //Le format de l'adresse mail est correcte, on peut donc la stocker dans une variable
        $email_user = $_POST["email_user"];
      }  
      //Contrôle longueur mot de passe
      if(strlen($_POST["mdp_user"])<8){

        //Affichage si mdp ne correspond pas au nombre de caractères requis
        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "Le mot de passe doit comporter au moins 8 caractères";</script>';
      

      } else if($_POST["mdp_user"]!=$_POST["confirm_mdp"]){//Contrôle correspondance des mdp

        //Affichage erreur
        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "Les mots de passe ne correspondent pas";</script>';
      }

      //Tout est OK
      //On hashe le mdp (algo de hashage BCRYPT (60 caractères) et non de chiffrement comme avec du md5 (obsolète et réversible)).
      $mdp_user = password_hash($_POST["mdp_user"], PASSWORD_BCRYPT);

      //On enregistre le mdp hashé en bdd
      require_once "../utils/connexionBdd.php";        

      //création d'un objet 
      $user = new UserBean();
      //On mets les valeur obtenues du formaulaire puis contrôlées dans l'objet
      $user->setNameUser($name_user);
      $user->setFirstNameUser($first_name_user);
      $user->setEmailUser($email_user);
      $user->setMdpUser($mdp_user);
      
      //On contrôle si l'utilisateur ("email_user") existe déjà (fonction userExists()) en bdd
      if($user->userExists($bdd)==true){

        //Affichage si utilisateur déjà existant
        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "Le compte utilisateur existe déjà";</script>';
      
      } else if($user->createUser($bdd)==true){

        //insertion message dans session car redirection
        $_SESSION["message"] = 'Le compte utilisateur '.$_SESSION["user"]['first_name_user'].' '.$_SESSION["user"]['name_user'].' a bien été créé!';
        
        //Redirection vers page profil
        header("Location: ../view/vueProfil.php");
      } else {

        echo '<script>let message = document.querySelector(".errMssg");';
        echo 'message.innerHTML = "L\'application a rencontré une erreur";</script>';
      }
    
    } else {
      //Erreur formulaire incomplet      
      echo '<script>let message = document.querySelector(".errMssg");';
      echo 'message.innerHTML = "Le formulaire est incomplet";</script>';
    }
  } 

