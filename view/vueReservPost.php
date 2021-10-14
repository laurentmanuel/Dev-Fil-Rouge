<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Réservations";
include("head.php");
?>
<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>
  </header>
  <div class="userForm">
    <form action="../controller/createReserv.php" method="post">
      <h3 class="connexTitle">Réserver:</h3>
      <div class="innerInputs">
        <label for="date_reserv">Selectionner une date: </label>
        <input type="date" name="date_reserv" size="15">
      </div>
      <div class="innerInputs">
        <label for="nb_people">Nombre de personnes: </label>
        <input type="number" min="1" step="1" max="20" name="nb_people">
      </div>
      <div class="innerInputs">
        <?php if (isset($_SESSION["user"])) : ?>
          <input class="styled" type="submit" value="Confirmer "></input>
          <button class="styled"><a href="../controller/readReserv.php">Revenir aux réservations</a></button>
        <?php else : ?>
          <button class="styled"><a href="../controller/logUser.php" class="favorite styled">Se connecter</a></button>
        <?php endif; ?>
      </div>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>