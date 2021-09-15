<?php
  //On connecte l'utilisateur 
  session_start();// on démarre la session php (un cookie se crée à cet instant, la session est un tableau )
  
  //pour protéger connexionUser si déjà connecté
  if(isset($_SESSION["user"])){
    header("Location: ../view/vueProfil.php");
    exit;
  } else {

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
        }

        //On se connecte à la bdd
        require_once "../utils/connexionBdd.php";

        $sql = "SELECT * FROM users WHERE email_user = :email_user";

        $query = $bdd->prepare($sql);

        //$query->bindValue;
        $query->bindValue(":email_user", $_POST["email_user"], PDO::PARAM_STR);//falcultatif, il s'agit d'un paramètre par défaut
        $query->execute();

        $user = $query->fetch();

        //Ici l'utilisateur n'existe pas
        if(!$user){
          die("L'utilisateur et/ou n'existe pas");
        }


        //Ici l'utilisateur est déjà crée dans la bdd, on doit vérfier le hash du mdp
        if(!password_verify($_POST["mdp_user"], $user["mdp_user"])){

          die("L'utilisateur et/ou n'existe pas");        

        } else {

          //Ici l'email (ou login) et le mdp sont OK

          //On stocke dans $session les infos de l'utilisateur (mais surtout pas le mdp)
          $_SESSION["user"] = [
            "id_user" => $user["id_user"],
            "name_user" => $user["name_user"],
            "first_name_user" => $user["first_name_user"],
            "email_user" => $user["email_user"],
            "admin_user" => $user["admin_user"]
          ];

          //On redirige vers la page profil.php par exemple
          header("Location: ../view/vueProfil.php"); //ATTENTION SYNTAXE: PAS D'ESPACE "Location: " ET NON "Location : " SINON ERREUR 500


          var_dump($_SESSION);

        




        }
      } else {

        //Dans le cas, le formulaire est incomplet
        die("Le formulaire est incomplet"); 
      } 

    } else {

      die("Le formulaire est vide");
    }
  }
?>