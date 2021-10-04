<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Modifer Réservation";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  </header>
  <div class="userForm">
    <form action="../controller/updateRes.php" method="post">
      <h3>Modifier une réservation:</h3>
      <p><label for="date_reserv">Selectionner une date: </label>
        <input type="date" name="date_reserv" value="<?= $reserv["date_reserv"] ?>" size="15">
      </p>
      <p><label for="nb_people">Nombre de personnes: </label>
        <input type="number" min="1" step="1" max="20" name="nb_people" value="<?= $reserv["nb_people"] ?>">
      </p>
      <input type="hidden" name="id_reserv" value="<?= $reserv["id_reserv"] ?>">
      <input type="submit" value="Modifier" class="favorite styled"></input>
      <p><a href="../controller/showReserv.php" class="favorite styled">Toutes vos réservations</a></p>
    </form>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>