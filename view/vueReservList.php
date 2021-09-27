<?php
  if(!isset($_SESSION["user"])){
    session_start();
  }
  $titre = "Mes réservations";
  include("head.php");

// //CODE QUI MARCHE CI_DESSOUS
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

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>
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
          <?php foreach ($allResByUser as $reservation): ?>
              <tr>
              <td><?= $reservation["id_reserv"] ?></td>
              <td><?= $reservation["date_reserv"] ?></td>
              <td><?= $reservation["nb_people"] ?></td>
              <td><?= $reservation["updatedOn"] ?></td> 
            </tr>
          <?php endforeach; ?>
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