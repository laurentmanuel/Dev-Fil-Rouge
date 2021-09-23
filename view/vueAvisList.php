<?php
session_start();
//head
include("head.php");
?>


<title>Apollo Space Park/Avis</title>
</head>

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
    <h1 class="pgTitle">Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h1>
  </header>

  <h2>avis</h2>

  <!-- http://localhost:8888/Projet%20Fil%20Rouge/developpement%20fR/view/vueAvis.php?note=4&tile_avis=top%21%21&comments=trop+bien -->
  
    <a href="vueAvisPost.php" class="btn btn-primary">Poster un avis</a>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>