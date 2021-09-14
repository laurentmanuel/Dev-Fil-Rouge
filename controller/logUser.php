<?php

    /*-----------------------------------------------------
                            Controler :
    -----------------------------------------------------*/
    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    
    //On démarre la session PHP
    session_start();
    //pour protéger la "vueLogin.php": si déjà connecté, on renvoie l'utilisateur vers la page profil.php
    if(isset($_SESSION["user"])){
    header("Location: ../view/profil.php");
    exit;
    }

    if($_SESSION["email_user"]->isUser()==true){
      
    }


/**************************************************************************/
/**************************************************************************/


    //on vérifie si le formulaire a été envoyé
    if(!empty($_POST)){

    echo "<p>Contenu du Formulaire envoyé: </p>";
    echo var_dump($_POST);

    //Le formulaire a été envoyé
    //On vérifie que tous les champs sont remplis
    if(isset($_POST["email_user"]) && isset($_POST["mdp_user"]) && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"])){

      //On vérifie que le format de l'email saisi est correct
      if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
        die ("L'adresse email est incorrecte");
      }

      //on se connecte à la bdd
      require_once ("../utils/connexionBdd.php");

      //On stocke la requête sql dans une variable
      $sql = "SELECT * FROM `users` WHERE `email_user` = :email_user";

      //Requête préparée pour éviter des injections sql
      $query = $bdd->prepare($sql);

      $query->bindValue(":email_user", $_POST["email_user"], PDO::PARAM_STR);

      $query->execute();
      
      $user = $query->fetch();

        if(!$user){
            //ici l'utilisateur n'existe pas
            die ("l'utilisateur et/ou le mot de passe n'existe pas");
      } 

        //Ici le user existe
        if(!password_verify($_POST["mdp_user"], $user["mdp_user"])){

          //Ici user OK mais password incorrect
          die ("l'utilisateur et/ou le mot de passe n'existe pas");
        }

            //on démarre la session php
            session_start();

            //Ici le user et le password sont OK
            echo "<p>Vous êtes connecté!</p>";
        
            //On va stocker dans la superglobale $_SESSION, les infos de l'utilisateur
            $_SESSION["user"] = [
            "id_user" => $user["id_user"],
            "name_user" => $user["name_user"],
            "first_name_user" => $user["first_name_user"],
            "email_user" => $user["email_user"],
            "role_admin" => $user["role_admin"]
            ];

            //On redirige vers la page profil.php par exemple
            header("Location: profil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500
        
    }

  }
