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
    <form action="../controller/updateUser.php" method="post">
      <h3>Mon Compte:</h3>
      <div>
        <label for="name">Nom:</label>
        <input type="text" placeholder="Votre nom" name="name_user" value="<?= $_SESSION["user"]["name_user"] ?>" size="25">
      </div>
      <div>
        <label for="first_name">Prénom: </label>
        <input type="text" placeholder="Votre prénom"name="first_name_user" value="<?= $_SESSION["user"]["first_name_user"] ?>" size="25">
      </div>
      <div>
        <label for="email">Email: </label>
        <input type="text" placeholder="Votre email" name="email_user" value="<?= $_SESSION["user"]["email_user"] ?>" size="35">
      </div>
      <div>
        <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"] ?>">
        <input class="styled" type="submit" value="Modifier vos Informations">
      </div>
      <div> 
        <button class="styled"><a href="../controller/updateMdp.php">Modifier mot de passe</a></button>
      </div>
      <span> 
        <button class="dangerBtn"><a href="../controller/deleteUser.php">Supprimer mon compte</a></button>
      </span>

      
    </form>
    
    <!--Affichage message -->
    <p><?= $_SESSION["user"]["message"] ?></p>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>