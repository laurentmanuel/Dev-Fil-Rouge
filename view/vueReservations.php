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
      <h3>Réserver</h3>
      <p>Selectionner une date: <input type="date" name="date_order"></p>
      <p>Nombre de personnes <input type="text" name="mdp_user"></p>
      <span>
        <input class="connexionBtn" type="submit" value="Confirmer">
      </span>
    </form>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>