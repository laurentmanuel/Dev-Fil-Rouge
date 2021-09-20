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
    require("../model/OrderBean.php");

    //ajout du fichier de connexion 
    include("../utils/connexionBdd.php");
    
    //import de la vue view_add_user.php (formulaire d'insertion d'un utilisateur)
    include("../view/vueReservations.php"); 
    /*-----------------------------------------------------
                            Tests :
    -----------------------------------------------------*/
    
    //pour rediriger vers la page login si l'utilisateur n'est pas déjà connecté
    if(!isset($_SESSION["user"])){
        
        
        echo '<p>id_user:'.$_SESSION["id_user"].'</p>';
    
        header("Location: ../view/vueProfil.php");
        exit;

        //On vérifie si le formulaire a été envoyé
        if(!empty($_POST)){

            //le formulaire a été envoyé
            echo 'formulaire envoyé: '.$_POST.'';

            //Vérifi si tous les champs sont complets
            if(isset($_POST["date_order"]) && isset($_POST["nb_people"])){
            
                $date_order->setDateOrder($_POST["date_order"]);
                $nb_people->setNbPeople($_POST["nb_people"]);
                $id_user->getIdUser($_SESSION["user"]);

                //création d'un objet depuis la valeur contenue dans le formulaire
                $order = new OrderBean($date_order, $nb_people, $id_user);

                echo 'Contenu objet order créé: '.$order.'';
                

                //Appel méthode de création d'une réservation
                $order->createOrder($bdd);

                echo '<p>Réservation confirmée le '.$_POST["date_order"].' pour '.$_POST["nb_people"].' personne(s)</p></div>';    
            
            } else {

                echo '<p>Veuillez remplir les champs de formulaire nom, contenu et date.</p></div>';
            }

        } else {

            echo "<p>Veuillez sélectionner une date et le nombre de personnes</p>";
        }
    }
?> 