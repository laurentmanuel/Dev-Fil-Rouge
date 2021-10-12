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
      <h3 class="connexTitle">Modifier une réservation:</h3>
      <div class="innerInputs">
        <label for="date_reserv">Selectionner une date: </label>
        <input type="date" name="date_reserv" value="<?= $reserv["date_reserv"] ?>" size="15">
      </div>
      <div class="innerInputs"><label for="nb_people">Nombre de personnes: </label>
        <input type="number" min="1" step="1" max="20" name="nb_people" value="<?= $reserv["nb_people"] ?>">
      </div>
      <div class="innerInputs">
        <input type="hidden" name="id_reserv" value="<?= $reserv["id_reserv"] ?>">
        <input type="submit" value="Confirmer" class="styled"></input>
        <button class="styled"><a href="../controller/readReserv.php">Voir vos réservations</a></button>
      </div>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>