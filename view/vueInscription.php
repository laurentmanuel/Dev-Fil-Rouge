<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Inscription";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/addUser.php" method="post">
      <h3>Créer un compte</h3>
      <p>Merci de bien vouloir remplir les champs suivants:</p>
      <div>
        <label for="name">Nom:</label>
        <input type="text" name="name_user" size="25">
      </div>
      <div>
        <label for="first_name">Prénom: </label>
        <input type="text" name="first_name_user" size="25">
      </div>
      <div>
        <label for="email">Email: </label>
        <input type="text" name="email_user" size="35">
      </div>
      <div>
        <label for="mdp">Mot de passe: </label>
        <input type="password" name="mdp_user"></p>
      </div>
      <div>
        <label for="confirm_mdp">Confirmer mot de passe: </label>
        <input type="password" name="confirm_mdp">
        <div>
          <p><a href="../view/vueLogin.php">Déjà un compte?</a></p>
          <span>
            <input class="connexionBtn" type="submit" value="créer le compte">
          </span>
    </form>
    <!--Affichage message -->
    <?php if (isset($_SESSION["user"])) : ?>
      <p><?= $_SESSION["user"]["message"] ?></p>
    <?php endif; ?>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>