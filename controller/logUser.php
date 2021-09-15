<?php

  //On vérifie si le formulaire a été envoyé
  if(!empty($_POST)){
    //le formulaire a été envoyé

    //on vérifie que tous les champs sont remplis
    if(isset($_POST["email_user"], $_POST["mdp_user"])
    && !empty($_POST["email_user"]) && !empty($_POST["mdp_user"])){
      //Le formulaire est complet

      //Filtrage par le Back-end du format email (plus sûr qu'en JS car peut-être js peut être désactivé)
      if(!filter_var($_POST["email_user"], FILTER_VALIDATE_EMAIL)){
        die ("L'adresse email est incorrecte");
      } else {         
        //l'adresse mail est correcte, on la stocke dans une variable
        $email_user = $_POST["email_user"];
      }  
      
      //On se connecte à la bdd
      require_once "../utils/connexionBdd.php";

      $sql = "SELECT * FROM users WHERE email_user = :email_user";

      $query = $bdd->prepare($sql);

      //$query->bindValue();
    }

  }


?>
