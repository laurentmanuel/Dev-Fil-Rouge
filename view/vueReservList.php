<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Mes réservations";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div>
    <section>
      <h3>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</h3>
      <table>
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
                    <a href="../controller/updateRes">Modifier</a>
                    <a href="../controller/deleteRes">Supprimer</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
  <p><a href="../view/vueReservations.php">Ajouter une réservation</a></p>
  </section>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>