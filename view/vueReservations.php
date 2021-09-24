<?php
//head
$titre = "Réservations";
include("head.php");
?>


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
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>

  </header>
  <div class="userForm">
    <form action="../controller/addReserv.php" method="post">
      <h3>Réserver:</h3>
      <p><label for="date_reserv">Selectionner une date: </label>
        <input type="date" name="date_reserv" size="15">
      </p>
      <p><label for="nb_people">Nombre de personnes: </label>
        <input type="number" min="1" step="1" max="20" name="nb_people">
      </p>
      <?php if (isset($_SESSION["user"])) : ?>
        <input class="btn btn-primary" type="submit" value="Confirmer "></input>
        <p><a href="../controller/showReserv.php" class="btn btn-primary">Vos réservations</a></p>
      <?php else : ?>
        <a href="../controller/logUser.php" class="btn btn-primary">Se connecter</a>
        <?php endif; ?>
      

    </form>
  </div>


  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>