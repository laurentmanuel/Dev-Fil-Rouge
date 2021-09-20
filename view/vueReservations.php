<?php
  //head
  include("head.php"); 
?>

  <title>Apollo Space Park Réservations</title>
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
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>

  </header>
  <div class="userForm">
    <form action="../controller/addOrder.php" method="post">
      <h3>Réserver:</h3>
      <p><label for="date_order">Selectionner une date: </label>
      <input type="date" name="date_order"></p>
      <p><label for="nb_people">Nombre de personnes: </label>
      <input type="number" min="1" step="1" max="20" name="nb_people"></p>
      <span>
        <input class="connexionBtn" type="submit" value="Confirmer ">
      </span>
    </form>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>