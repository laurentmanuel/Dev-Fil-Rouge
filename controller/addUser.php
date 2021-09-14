<?php

    /*-----------------------------------------------------
                          Controler :
    -----------------------------------------------------*/

    /*-----------------------------------------------------
                          Session :
    -----------------------------------------------------*/

    //on démarre la session PHP
    session_start();

    /*-----------------------------------------------------
             Imports à effectuer pour ajout en bdd:
    -----------------------------------------------------*/

    //appel de la classe UserBean
    require("../model/UserBean.php");

    //appel du fichier de connexion bdd
    require("../utils/connexionBdd.php");

    //appel vue Inscription
    require("../view/vueInscription.php"); 
    
    
    /*-----------------------------------------------------
                            Filtres:
    -----------------------------------------------------*/

    //Condition pour protéger addUser si l'utilisateur est déjà connecté, on le renvoie vers sa page vueProfil.php
    if(isset($_SESSION["user"])){
        header("Location: ../view/vueProfil.php");
        exit;
    }

    //on vérifie si le formulaire a été envoyé (ou n'est pas vide)
    if(!empty($_POST)){
      
      //Le formulaire a été envoyé, on vérifie maintenant si l'email saisi n'existe pas déjà
      if($emailUser->isUser() == true){
        die ("L'utilisateur existe déjà, merci de rectifier");
      }

      //Ici l'utilisateur n'existe pas 
      //On vérifie donc que toutes les champs soient bien remplis
      if(isset($_POST["name_user"]) && isset($_POST["first_name_user"]) && isset($_POST["email_user"]) && isset($_POST["mdp_user"]) && !empty($_POST["name_user"]) && !empty($_POST["first_name_user"]) && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"])){
        
        //Le formulaire est complet
        echo "<p>Le formulaire est complet</p>"; 

        //On récupère les données en les protégeant          
        $nameUser = htmlspecialchars($_POST["name_user"]);
        $firstNameUser = htmlspecialchars($_POST["first_name_user"]);

        //Filtrage Back-end du format d'email plus sûr qu'en JS car peut-être js peut être désactivé)
        if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
          die ("L'adresse email est incorrecte");
        }
      
        //On hashe le mdp (algo de hashage BCRYPT (60 caractères).
        $mdpUser = password_hash($_POST["mdp_user"], PASSWORD_BCRYPT);

        //On enregistre le mdp hashé en bdd
        require_once "../utils/connexionBdd.php";

        //création d'un objet user de la classe UserBean à partir des valeurs du formulaire
        $user = new UserBean([$nameUser], [$firstNameUser], [$emailUser], [$mdpUser]);
        
        echo "<p>Objet user: </p>";
        echo $user;
        
        //appel de la méthode de création d'utilisateur
        $user->createUser($bdd);
        
        //on démarre la session php pour éviter à l'utilisateur de devoir se loguer aprés avoir créé son compte
        session_start();

        //On stocke dans une super globale $_SESSION les infos de l'utilisateur
        $_SESSION["user"] = [
        "id_user" => $user["id_user"],
        "name_user" => $user["name_user"],
        "first_name_user" => $user["first_name_user"],
        "email_user" => $user["email_user"]
        //"role_user" => $user["role_user"],
        ];

        //On redirige vers la page profil.php par exemple
        header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500
    }
    }
  
?>