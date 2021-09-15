<?php

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

          var_dump($query);
          

        } catch(Exception $e) {
          //affichage d'une exception en cas d’erreur
          die('Erreur : '.$e->getMessage());
        }   


    } else {
        die("Le formulaire est incomplet"); 
    };
  }
  
?>