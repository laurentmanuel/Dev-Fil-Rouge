<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Mise à jour Profil";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/addUser.php" method="post">
      <h3>Mon Compte</h3>
      <div>
        <label for="name">Nom:</label>
        <input type="text" name="name_user" value="<?= $_SESSION["user"]["name_user"] ?>" size="25">
      </div>
      <div>
        <label for="first_name">Prénom: </label>
        <input type="text" name="first_name_user" value="<?= $_SESSION["user"]["first_name_user"] ?>" size="25">
      </div>
      <div>
        <label for="email">Email: </label>
        <input type="text" name="email_user" value="<?= $_SESSION["user"]["email_user"] ?>" size="35">
      </div>
      <div>
        <label for="mdp">Mot de passe: </label>
        <input type="password" name="mdp_user" value="<?= $_SESSION["user"]["mdp_user"] ?>">
      </div>
      <div id="confirm_mdp">
        <label for="confirm_mdp">Confirmer mot de passe: </label>
        <input type="password" name="confirm_mdp">
        <div>
          <p><a href="../view/vueLogin.php">Déjà un compte?</a></p>
          <span>
            <input class="connexionBtn" type="submit" value="créer le compte">
          </span>
    </form>






    <!-- <div class="userForm">
    <form action="../controller/logUser.php" method="post">
      <h3>Connexion</h3>
      <label for="email">Votre email: </label>
        <input type="text" name="email_user" size="35">
      <label for="mdp">Votre Mot de passe: 
        <input type="password" name="mdp_user">
      </label>
      <p><a href="../view/vueInscription.php">Pas encore de compte?</a></p>
      <span>
        <input class="connexionBtn" type="submit" value="se connecter">
      </span>
    </form> -->

    
  </div> -->
    <!--Affichage message -->
    <?php if (isset($_SESSION["user"])) : ?>
      <p><?= $_SESSION["user"]["message"] ?></p>
    <?php endif; ?>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>