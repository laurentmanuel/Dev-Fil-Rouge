<?php 
  session_start();
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
    <h1 class="pgTitle">Réservations</h1>>
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>

  </header>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>