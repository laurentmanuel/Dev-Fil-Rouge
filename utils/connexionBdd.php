<?php
    //connexion à la base de données
    $bdd = new PDO('mysql:host=localhost;dbname=projet_fR_db', 'root','root', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //pour afficher les erreurs de connexion à la bdd, le cas échéant
?>