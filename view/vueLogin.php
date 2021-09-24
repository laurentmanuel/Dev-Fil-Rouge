<?php
  if(isset($_SESSION["user"])){
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
      <h3>Connexion</h3>
      <label for="email">Votre email: </label>
        <input type="text" name="email_user" size="35">
      <label for="mdp">Votre Mot de passe: </label>
        <input type="password" name="mdp_user">
      <p><a href="vueInscription.php">Pas encore de compte?</a></p>
      <span>
        <input class="connexionBtn" type="submit" value="se connecter">
      </span>
    </form>
  </div>
  

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>