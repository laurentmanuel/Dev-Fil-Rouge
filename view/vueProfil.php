<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Votre compte";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <h3>Votre profil:</h3>
    <div>
    <p>Nom: <?= $_SESSION["user"]["name_user"]; ?></p>
    </div>
    <div>
      <p>Prénom: <?= $_SESSION["user"]["first_name_user"]; ?></p>
    </div>
    <div>
      <p>Email: <?= $_SESSION["user"]["email_user"]; ?></p>
    </div>
    <div>
      <p>Mot de passe: <?= $_SESSION["user"]["mdp_user"]; ?></p>
    </div>




    <button><a href="../controller/updateUser.php">Modifier profil</a></button>
   



    
    <!--Affichage message -->
    <p><?= $_SESSION["user"]["message"] ?></p>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>