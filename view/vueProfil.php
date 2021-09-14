<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- head  -->
  <?php include("head.php"); ?>
  <title>Apollo Space Park Mon Profil</title>
</head>

<body>

  <div id="bordure">
    <span id="vertical_title">Apollo Space Park</span>
  </div>
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

  <h2>Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h2>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>