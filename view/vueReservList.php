<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Vos réservations";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>
  <div>
    <main class="container">
      <div class="row">
        <section class="col-10">
          <h3>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</h3>
          <table class="table">
            <thead>
              <tr>
                <th>numéro de réservation</th>
                <th>pour le :</th>
                <th>Nombre de personnes</th>
                <th>Créé/Modifié le:</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allResByUser as $reserv) : ?>
                <tr>
                  <td><?= $reserv["id_reserv"] ?></td>
                  <td><?= $reserv["date_reserv"] ?></td>
                  <td><?= $reserv["nb_people"] ?></td>
                  <td><?= $reserv["updatedOn"] ?></td>
                  <td>
                    <div class="dropdown">
                      <button class="dropbtn">Actions</button>
                      <div class="dropdown-content">
                        <a href="../controller/updateRes.php?id_reserv=<?= $reserv["id_reserv"] ?>">Modifier</a>
                        <a href="../controller/deleteRes.php?id_reserv=<?= $reserv["id_reserv"] ?>">Supprimer</a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
      <button type="button" class="styled"><a href="../view/vueReservations.php">Ajouter une réservation</a></button>
      </section>
  </div>
  </main>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>