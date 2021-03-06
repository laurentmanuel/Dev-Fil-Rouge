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
    <form action="../controller/createUser.php" method="post">

      <h3>Créer un compte</h3>
      <p>Merci de bien vouloir remplir les champs suivants:</p>
      <div class="innerInputs">
        <label for="name">Nom:</label>
        <input type="text" name="name_user" size="25" placeholder="nom" required>
      </div>
      <div class="innerInputs">
        <label for="first_name">Prénom: </label>
        <input type="text" name="first_name_user" size="25" placeholder="prénom" required>
      </div>
      <div class="innerInputs">
        <label for="email">Email: </label>
        <input type="email" name="email_user" size="35" placeholder="email" required>
      </div>
      <div class="innerInputs">
        <label for="mdp">Mot de passe: </label>
        <input type="password" name="mdp_user" placeholder="8 caractères minimum"required></p>
      </div>
      <div class="innerInputs">
        <label for="confirm_mdp">Confirmer mot de passe: </label>
        <input type="password" name="confirm_mdp" placeholder="8 caractères minimum" required>
      </div>
      <span>
        <p><a href="../controller/logUser.php">Déjà un compte?</a></p>
      </span>
      <span>
        <input class="styled" type="submit" value="Créer mon compte">
      </span>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <?php include("footer.php"); ?>
</body>

</html>