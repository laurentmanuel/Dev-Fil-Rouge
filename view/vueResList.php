<?php
session_start();
//head
include("head.php");

require("../utils/connexionBdd.php");

try {

  $id_user = $_SESSION["user"]["id_user"];

  $sql = "SELECT * FROM orders WHERE id_user = :id_user ORDER BY updatedOn asc";

  $query = $bdd->prepare($sql);
  $query->bindValue(":id_user", $id_user, PDO::PARAM_STR);
  
  $query->execute();
  $result = $query->fetchAll(PDO::FETCH_ASSOC);

} catch(Exception $e) {

  die('Erreur : '.$e->getMessage());
}


?>

<title>Apollo Space Park Réservations</title>
<!-- Voir affichage dynamique des titres d'onglet -->
<!-- Voir affichage dynamique des titres d'onglet -->
<!-- Voir affichage dynamique des titres d'onglet -->
<!-- Voir affichage dynamique des titres d'onglet -->
</head>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <header>
    <!-- banniere supérieure        -->
    <?php include("header.php"); ?>

    <!-- Navigation desktop -->
    <?php include("navbar.php"); ?>
    <h1 class="pgTitle">Réservations</h1>
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span><!-- Balise span vide pour bouton burger -->
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>

  </header>

  <main class="container">
    <div class="row">
      <section class="col-8">
        <h1>Liste des réservations par utilisateur</h1>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Numéro rés</th>
              <th scope="col">pour le :</th>
              <th scope="col">Nombre de personnes</th>
              <th scope="col">créé le:</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <?php foreach ($result as $order) {
          ?>
            <tr>
              <td><?= $order['id_order'] ?></td>
              <td><?= $order['date_order'] ?></td>
              <td><?= $order['nb_people'] ?></td>
              <td><?= $order['updateOn'] ?></td>
              <td><a href="details.php?id=<?= $order['id'] ?>">Voir plus</a></td>
            </tr>
          <?php
          }
          ?>
          
          </tbody>
        </table>
        <p><a href="vueReserver.php" class="btn btn-primary">Ajouter une réservation</a></p>
      </section>
    </div>
  </main>


  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>