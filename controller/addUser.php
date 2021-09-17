<?php

  /*----------------------------------------------------
                          SESSSION:
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
    require("../view/vueInscription.php"); 


  /*-----------------------------------------------------
                        CONTROLLER:
   -----------------------------------------------------*/


  //pour interdire l'accés à "addUser.php" si déjà connecté (on renvoie vers page "vueProfil.php")
  if(isset($_SESSION["user"])){
    
    header("Location: ../view/vueProfil.php");
    exit;
  } else {

    //On vérifie si le formulaire a été envoyé
    if(!empty($_POST)){
      //le formulaire a été envoyé
      
      //on vérifie que tous les champs sont remplis
      if(isset($_POST["name_user"], $_POST["first_name_user"], $_POST["email_user"], $_POST["mdp_user"])
      && !empty($_POST["name_user"]) && !empty($_POST["first_name_user"]) && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"])){
        //Le formulaire est complet

        //On récupère les données en les protégeant
        $name_user = strip_tags($_POST["name_user"]);
        $first_name_user = strip_tags($_POST["first_name_user"]);

        //Filtrage par le Back-end du format email (plus sûr qu'en JS car peut-être js peut être désactivé)
        if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
          die ("<p>L'adresse email est incorrecte</p>");

        } else {

          //Le format de l'adresse mail est correcte, on peut donc la stocker dans une variable
          $email_user = $_POST["email_user"];
        }  


        //Ajouter ici tous les contrôles requis
        // ******
        // ******
        // ******      
        // ******
        

        //On va hasher le mdp (algo de hashage BCRYPT (60 caractères) et non de chiffrement comme avec du md5 (obsolète et réversible)).
        $mdp_user = password_hash($_POST["mdp_user"], PASSWORD_BCRYPT);

        //On enregistre le mdp hashé en bdd
        require_once "../utils/connexionBdd.php";        

        //création d'un objet depuis les valeurs contenues dans le formulaire
        //$user = new UserBean($_POST["name_user"], $_POST["first_name_user"], $_POST["admin_user"], $_POST["mdp_user"]);
        $user = new UserBean("$name_user", "$first_name_user", "$email_user", "$mdp_user");
        
        //On teste si l'utilisateur ("email_user") existe déjà (fonction userExists())
        if($user->userExists($bdd)==true){

          die("<p>L'utilisateur existe déjà!");
        } else {

          $user->createUser($bdd);
        }

        //réponse si l'utilisateur existe déja
        echo '<p>Le compte utilisateur <span>'.$_POST['first_name_user'].'</span> <span>'.$_POST['name_user'].'</span> a été créé!</p>';  


        //On récupère l'id du nouvel utilisateur
        $id = $bdd->lastInsertId();
        
        //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
        $_SESSION["user"] = [
          "id_user" => $id, //Récupéré grâce à lastInsertId()
          "name_user" => $name_user,
          "first_name_user" => $first_name_user,
          "email_user" => $email_user
        ];
          
        //On redirige vers la page profil.php par exemple
        header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500

      } else {

        die("<p>Il manque des informations>/p>"); 
      }

    } else {

      die("<p>Le formulaire n'est pas renseigné</p>"); 
    } 
  }
?>