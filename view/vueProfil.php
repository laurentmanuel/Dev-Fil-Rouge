<?php 
  if(!isset($_SESSION["user"])){
    session_start();
  } 
  $titre = "Mon compte";
  include("head.php"); 
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  
  <!-- header -->
  <?php include("header.php"); ?>
<div class="userForm">
  <p>Votre profil:</p>

  <p>Nom: <?= $_SESSION["user"]["name_user"]; ?></p>
  <p>Prénom: <?= $_SESSION["user"]["first_name_user"]; ?></p>
  <p>Email: <?= $_SESSION["user"]["email_user"]; ?></p>

  <button><a href="../controller/updateUser.php">Modifier profil</a></button>
  </form>

  <!--Affichage message -->
  <p><?= $_SESSION["user"]["message"] ?></p>
</div>
  <!-- footer  -->  
  <?php include("footer.php"); ?>
</body>

</html>