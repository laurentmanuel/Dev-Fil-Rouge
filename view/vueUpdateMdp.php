<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Mot de passe";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/updateMdp.php" method="post">
      <h3 class="connexTitle">Modification du mot de passe:</h3>
      <div>
        <label for="old_mdp">Ancien mot de passe:</label>
        <input type="password" name="mdp_user" value="" size="25" placeholder="8 caratères minimum">
      </div>
      <div class="innerInputs">
        <label for="new_mdp">Nouveau mot de passe: </label>
        <input type="password" name="new_mdp" value="" size="25" placeholder="8 caratères minimum">
      </div>
      <div class="innerInputs">
        <label for="confirm_mdp">Confirmer nouveau mot de passe: </label>
        <input type="password" name="confirm_mdp" value="" size="35" placeholder="8 caratères minimum">
      </div>
      <span>
        <input type="hidden" name="email_user" value="<?= $_SESSION["user"]["email_user"] ?>">
        <input type="submit" value="Confirmer" class="styled">
        <button class="styled"><a href="../controller/updateUser.php">Retour</a></button>
      </span>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>