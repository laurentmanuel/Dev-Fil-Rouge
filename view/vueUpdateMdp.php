<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Modification Mot de passe";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/updateMdp.php" method="post">
      <h3>Modification du mot de passe</h3>
      <div>
        <label for="old_mdp">Ancien mot de passe:</label>
        <input type="password" name="old_mdp" value="" size="25">
      </div>
      <div>
        <label for="new_mdp">Nouveau mot de passe: </label>
        <input type="password" name="new_mdp" value="" size="25">
      </div>
      <div>
        <label for="confirm_mdp">Confirmer nouveau mot de passe: </label>
        <input type="password" name="confirm_mdp" value="" size="35">
      </div>
      <span>
        <input class="connexionBtn" type="submit" value="Confirmer">
      </span>
    </form>

  </div>
  <!--Affichage message -->
  <?php if (isset($_SESSION["user"])) : ?>
    <p><?= $_SESSION["user"]["message"] ?></p>
  <?php endif; ?>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>