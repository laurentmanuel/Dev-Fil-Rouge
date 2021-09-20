<?php
  //head
  include("head.php"); 
?>
  <title>Apollo Space Park Mon compte</title>
</head>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>
  
  <header>
    <!-- banniere supérieure        -->
    <?php include("header.php"); ?>
    <!-- Navigation desktop -->
    <?php include("navbar.php"); ?>
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>
    <h1 class="pgTitle">Mon Compte</h1>>
  </header>

  <?php if (isset($_SESSION["user"])) : ?>
    <h2>Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h2>
  <?php else : ?>
  <?php endif ?>

  <div class="userForm">
    <form action="../controller/logUser.php" method="post">
      <h3>Connexion</h3>
      <p>Votre email: <input type="text" name="email_user" size="35"></p>
      <p>Votre Mot de passe: <input type="password" name="mdp_user"></p>
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