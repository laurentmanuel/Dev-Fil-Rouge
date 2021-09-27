<?php
  if(!isset($_SESSION["user"])){
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
  <main class="container">
    <div>
      <section>
        <h3>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</h3>
        <table>
          <thead>
            <tr>
              <th>numéro de réservation</th>
              <th>pour le :</th>
              <th>Nombre de personnes</th>
              <th>créé ou mis à jour le:</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($allResByUser as $res): ?>
            <tr>
              <td><?= $res["id_reserv"] ?></td>
              <td><?= $res["date_reserv"] ?></td>
              <td><?= $res["nb_people"] ?></td>
              <td><?= $res["updatedOn"] ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <p><a href="vueReservations.php" class="btn btn-primary">Ajouter une réservation</a></p>
      </section>
    </div>
    <?php var_dump($allResByUser); ?>
  </main>


  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>