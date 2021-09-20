<?php 
  session_start();
  //head
  include("head.php"); 
?>

 
<title>Apollo Space Park Mon Profil</title>
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
    <h1 class="pgTitle">Bonjour <?= $_SESSION["user"]["first_name_user"] ?> !</h1>
  </header>

  <h2>Votre profil:</h2>

  <p>Nom: <?= $_SESSION["user"]["name_user"]; ?></p>
  <p>Prénom: <?= $_SESSION["user"]["first_name_user"]; ?></p>
  <p>Email: <?= $_SESSION["user"]["email_user"]; ?></p>

  <!--Affichage message -->
  <p><?= $_SESSION["user"]["message"] ?></p>


  <!-- footer  -->  
  <?php include("footer.php"); ?>
</body>

</html>