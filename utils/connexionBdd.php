<?php
    //connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=projet_fR_db', 'root','root', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //pour afficher les erreurs de connexion à la bdd, le cas échéant

    //Mode de fetch part défaut
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // //Constantes d'environnement
    // define("DBHOST", "locahost");
    // define("DBNAME", "projet_fR_db");
    // define("DBUSER", "root");
    // define("DBPASS", "root");

    // //DSN de connexion
    // $dsn = "mysql:dbname=".DBNAME.";host=".DBHOST;

    // //connexion à la bdd
    // try {
    //     //On instancie le PDO
    //     $bdd = new PDO($dsn, DBUSER, DBPASS);

    //     //On s'assure d'envoyer les données en utf-8 (gestion des accents)
    //     $bdd->exec("SET NAMES utf8");  

    //     //On est connecté à la bdd
    //     echo "<p>Vous êtes connectés</p>";

    // } catch (PDOException $e){
    //     die($e->getMessage());
    // }

?>