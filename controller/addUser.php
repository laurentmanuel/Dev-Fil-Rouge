<?php
 
  //On connecte l'utilisateur aprés la création de son compte
  session_start();// on démarre la session php (un cookie se crée à cet instant, la session est un tableau )
  
  //pour interdire accés page addUser.php si déjà connecté
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
          die ("L'adresse email est incorrecte");

        } else {

          //l'adresse mail est correcte, on la stocke dans une variable
          $email_user = $_POST["email_user"];
        }  

        //On va hasher le mdp (algo de hashage BCRYPT (60 caractères) et non de chiffrement comme avec du md5 (obsolète et réversible)).
        $mdp_user = password_hash($_POST["mdp_user"], PASSWORD_BCRYPT);


        //Ajouter ici tous les contrôles requis
        // ******
        // ******
        // ******
        // ******

        //On enregistre le mdp hashé en bdd
        require_once "../utils/connexionBdd.php";

        $sql = "INSERT INTO users(name_user, first_name_user, email_user, mdp_user, admin_user) VALUES
        (:name_user, :first_name_user, :email_user, :mdp_user, false)";

        $query = $bdd->prepare($sql);
        var_dump($bdd);

        try{         

          $query->execute(array(
            "name_user" => $name_user,
            "first_name_user" => $first_name_user,
            "email_user" => $email_user,
            "mdp_user" => $mdp_user));

            echo "<p>Votre compte a été créé!</p>";

            //On récupère l'id du nouvel utilisateur
            $id = $bdd->lastInsertId();


            //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
            $_SESSION["user"] = [
            "id_user" => $id, //Récupéré grâce à lastInsertId()
            "name_user" => $name_user,
            "first_name_user" => $first_name_user,
            "email_user" => $email_user,
            "admin_user" => $_POST["admin_user"]
            ];

            //On redirige vers la page profil.php par exemple
            header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500







        } catch(Exception $e) {
          //affichage d'une exception en cas d’erreur
           die('Erreur : '.$e->getMessage());
        }   


      } else {
          die("Le formulaire est incomplet"); 
      };
    }
  }
?>