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
  <div class="container">
    <section>
      <table>
        <caption>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</caption>
        <thead>
          <tr>
            <th class="col_res_1">#</th>
            <th class="col_res_2">Pour le :</th>
            <th class="col_res_3">Nombre:</th>
            <th class="col_res_4">Créé/Modifié le:</th>
            <th class="col_res_5">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allResByUser as $reserv) : ?>
            <tr>
              <td class="col_res_1"><?= $reserv["id_reserv"] ?></td>
              <td class="col_res_2"><?= $reserv["date_reserv"] ?></td>
              <td class="col_res_3"><?= $reserv["nb_people"] ?></td>
              <td class="col_res_4"><?= $reserv["updatedOn"] ?></td>
              <td class="col_res_5">
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
      <button type="button" class="styled"><a href="../view/vueReservations.php">Ajouter une réservation</a></button>
    </section>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>