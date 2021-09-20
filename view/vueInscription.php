<?php
  //head
  include("head.php"); 
?>
  <title>Apollo Space Park créer un compte</title>
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
    <h1 class="pgTitle">Créer un compte</h1>
  </header>

  <div class="userForm">
    <form action="../controller/addUser.php" method="post">
      <h3>Créer un compte</h3>
      <p>Merci de bien vouloir remplir les champs suivants:</p>
      <p>Nom: <input type="text" name="name_user" size="25"></p>
      <p>Prénom: <input type="text" name="first_name_user"size="25"></p>
      <p>Email: <input type="text" name="email_user" size="35"></p>
      <p>Mot de passe: <input type="password" name="mdp_user"></p>
      <p><a href="../view/vueLogin.php">Déjà un compte?</a></p>
      <span>
        <input class="connexionBtn" type="submit" value="créer le compte">
      </span>
      <!-- <?php include "../view/message.php" ?> -->
    </form>
  </div>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>