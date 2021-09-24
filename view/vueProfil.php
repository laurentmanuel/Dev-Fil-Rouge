<?php 
  session_start();
  //head
  $titre = "Mon compte";
  include("head.php"); 
?>

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
    <h1 class="pgTitle">Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h1>
  </header>

  <h2>Votre profil:</h2>

  <p>Nom: <?= $_SESSION["user"]["name_user"]; ?></p>
  <p>Prénom: <?= $_SESSION["user"]["first_name_user"]; ?></p>
  <p>Email: <?= $_SESSION["user"]["email_user"]; ?></p>

  <form action="../controller/updateMdp.php">
  <p><label for="mdp_user">Modifier mot de passe</label></p>
  <input type="password" name="mdp_user" value="Modifier Mot de passe">
  </form>

  <!--Affichage message -->
  <p><?= $_SESSION["user"]["message"] ?></p>


  <!-- footer  -->  
  <?php include("footer.php"); ?>
</body>

</html>