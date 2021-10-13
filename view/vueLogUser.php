<?php
if(isset($_SESSION["user"])) {
  session_start();
}
$titre = "Connexion";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>
  <?php if (isset($_SESSION["user"])) : ?>
    <h2>Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h2>
  <?php else : ?>
  <?php endif ?>
  <div class="userForm">
    <form action="../controller/logUser.php" method="post">
      <h3 class="connexTitle">Connexion:</h3>
      <div>
        <label for="email">Email: </label>
        <input type="email" name="email_user" size="35" placeholder="votre email" required>
      </div>
      <div class="innerInputs">
        <label for="mdp">Mot de passe: </label>
        <input type="password" name="mdp_user" placeholder="8 caractères minimum" required>
      </div>
      <div class="innerInputs">
        </label>
        <p><a href="../controller/logUser.php">Pas encore de compte?</a></p>
      </div>
      <span>
        <input class="styled" type="submit" value="se connecter">
      </span>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>