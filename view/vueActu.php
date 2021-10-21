<?php 
  if(!isset($_SESSION["user"])){
    session_start();
  }
  $titre = "Actualité";
  include("head.php"); 
?>
<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>
  <div class="container">
    <img id="travaux" src="../contenu/images_fR/travaux.png" alt="travaux">
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>