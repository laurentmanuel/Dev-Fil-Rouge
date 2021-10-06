<?php
if (isset($_SESSION["user"])) {
  session_start();
}
$titre = "Supprimer mon compte";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <?php if (isset($_SESSION["user"])) : ?>

  <?php endif ?>

  <div class="userForm">
    <form action="../controller/deleteUser.php" method="post">
      <h3 class="connexTitle">Supprimer compte <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?></h3>
      <div>
        <label for="mdp_user">Mot de passe:</label>
        <input type="password" name="mdp_user" size="35" placeholder="8 caractères">
      </div>
      <div class="innerInputs">
        <label for="confirm_mdp">Confirmer mot de passe:</label>
        <input type="password" name="confirm_mdp" size="35" placeholder="8 caractères">
      </div>
      <div class="btnContainer">
        <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"] ?>">
        <input class="dangerBtn" type="submit" value="Confirmer suppression">
        <button class="styled"><a href="../view/vueProfil.php">Retour</a></button>
      </div>
    </form>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>