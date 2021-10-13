<?php
    session_start();//pour se déconnecter, il faut que la session soit démarrée préalablement

    //pour protéger deconnexion: si pas connecté, on renvoie vers le formulaire de connexion
    if(!isset($_SESSION["user"])){
    header("Location: ../view/vueLogUser.php");
    exit;
    }

    //Supprime une variable et uniquement la partie user (différent de session_destroy qui supprime tout, panier etc)
    unset($_SESSION["user"]);

    //Redirection  
    header("Location: ../view/vueAccueil.php");
?>
