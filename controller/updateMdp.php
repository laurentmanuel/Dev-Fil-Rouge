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
    require("../view/vueUpdateMdp.php"); 

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

            
            //on vérifie que tous les champs sont remplis
            if(isset($_POST["email_user"]) && isset($_POST["mdp_user"]) && isset($_POST["new_mdp"]) && isset($_POST["confirm_mdp"])
            && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"]) && !empty($_POST["new_mdp"]) && !empty($_POST["confirm_mdp"])){
                //Le formulaire est complet
                var_dump($_SESSION["user"]);
                //On contrôle l'ancien mdp avec le hash
                if(!password_verify($_POST["mdp_user"], $_SESSION["user"]["mdp_user"])){

                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "L\'ancien mot de passe est incorrect";</script>';
                } else {

                    echo '<script>let message = document.querySelector(".okMssg");';
                    echo 'message.innerHTML = "Ancien mot de passe OK";</script>';
                }
                
                if(strlen($_POST["new_mdp"])<8){

                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "Le mot de passe doit comporter au moins 8 caractères";</script>';
                    
                } else if ($_POST["new_mdp"]!=$_POST["confirm_mdp"]){

                    echo '<script>let message = document.querySelector(".errMssg");';
                    echo 'message.innerHTML = "Les mots de passe ne correspondent pas";</script>';                    
                } else {
                    
                    //nouveau mdp OK, on peut donc le hasher et le stocker dans la variable $mdp_user
                    $mdp_user = password_hash($_POST["new_mdp"], PASSWORD_BCRYPT);
                } 

                //On créé un objet 
                $user = new UserBean();
                $user->setMdpUser($mdp_user);
                $user->setEmailUser($_POST["email_user"]);
                $user->updateMdp($bdd);
            
                //Mise à jour des valeurs de la session
                $_SESSION["user"]["mdp_user"] = $user->getMdpUser();

                //Affichage à gérer
                echo '<script>let message = document.querySelector(".okMssg");';
                echo 'message.innerHTML = "Votre mot de passe a bien été modifié";</script>';           
                //Redirection gestion de l'affichage
                header("Location: ../view/vueProfil.php");

            } else {

                echo '<script>let message = document.querySelector(".errMssg");';
                echo 'message.innerHTML = "Le formulaire est incomplet";</script>';
            }
        }
    } 