<?php

    /*-----------------------------------------------------
                        Session :
    -----------------------------------------------------*/
    //création de la session
    session_start();

    /*-----------------------------------------------------
                        Imports :
    -----------------------------------------------------*/ 
    
    //appel de la classe OrderBean
    require("../model/AvisBean.php");

    //ajout du fichier de connexion 
    include("../utils/connexionBdd.php");
    
    //import de la vue view_add_user.php (formulaire d'insertion d'un utilisateur)
    include("../view/vueAvisPost.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //Si utilisateur pas connecté, on le redirige vers la page login
    if(!isset($_SESSION["user"])){    
    
        header("Location: ../view/vueLogin.php");
    } else {

        //On vérifie si le formulaire a été envoyé
        if(!empty($_POST)){

            echo "<p>formulaire envoyé</p>";
            var_dump($_POST);//le formulaire a été envoyé

            //Vérif si tous les champs sont complets
            if(isset($_POST["note"]) && isset($_POST["title_avis"]) && isset($_POST["comments"])
            && !empty($_POST["note"]) && !empty($_POST["title_avis"]) && !empty($_POST["comments"])){            
             
                //création d'une instance d'objet OrderBean depuis les valeurs du formulaire
                $avis = new AvisBean();
                $avis->setNote($_POST["note"]);
                $avis->setTitleAvis($_POST["title_avis"]);
                $avis->setComments($_POST["comments"]);
                
                //Récupération de l'id de l'utilisateur
                $avis->setIdUserAvis($_SESSION["user"]["id_user"]);
                echo '<p>contenu obj avis</p>';
                var_dump($avis);

                //Appel méthode de création d'une réservation
                $avis->createAvis($bdd);
                

                echo '<p>Merci '.$_SESSION["user"]["name_user"].' pour votre évaluation!</p></div>';    
            
            } else {

                echo "<p>Veuillez compléter les informations manquantes SVP.</p>";
            }

        } else {

            echo "<p>Le formulaire est vide</p>";
        }
    }
?> 