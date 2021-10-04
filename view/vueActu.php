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

  <!-- footer  -->
  <?php include("footer.php"); ?>

<h1>Work In progress</h1>

</body>

</html>