<?php
$titre = "Mes réservations";
include("head.php");

//CODE QUI MARCHE CI_DESSOUS
// require("../utils/connexionBdd.php");

// $id_user = $_SESSION["user"]["id_user"];

// try {
//   $sql = "SELECT * FROM reservations WHERE id_user = :id_user ORDER BY updatedOn asc";

//   $query = $bdd->prepare($sql);
//   $query->bindValue(":id_user", $id_user, PDO::PARAM_STR);
//   $query->execute();
//   $result = $query->fetchAll(PDO::FETCH_ASSOC);

// } catch (Exception $e) {
//   die('Erreur : ' . $e->getMessage());
// }
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
        <h3>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</h3>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">numéro de réservation</th>
              <th scope="col">pour le :</th>
              <th scope="col">Nombre de personnes</th>
              <th scope="col">créé ou mis à jour le:</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($result as $reserv) {
          ?>
            <tr>
              <td><?= $reserv['id_reserv'] ?></td>
              <td><?= $reserv['date_reserv'] ?></td>
              <td><?= $reserv['nb_people'] ?></td>
              <td><?= $reserv['updatedOn'] ?></td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Voir détails</a></li>
                    <li><a class="dropdown-item" href="#">Modifier réservation</a></li>
                    <li><a class="dropdown-item" href="#">Supprimer réservation</a></li>
                  </ul>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
          </tbody>
        </table>
        <p><a href="vueReservations.php" class="btn btn-primary">Ajouter une réservation</a></p>
      </section>
    </div>
  </main>


  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>