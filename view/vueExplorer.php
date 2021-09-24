<?php 
  session_start();
  //head
  $titre = "Explorer";
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
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>

    <h1 class="pgTitle">Explorer</h1>
  </header>






  <!-- footer  -->
  <?php include("footer.php"); ?>

</body>

</html>