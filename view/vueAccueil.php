<?php 
  session_start();
  //head
  $titre = "Accueil";
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

    <!-- Navigation small devices -->
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span>
    </div>

    <!-- Menu burger -->
    <?php include("burger.php"); ?>
    <h1 class="pgTitle">Accueil</h1>

  </header>

  <div id="une">
    <article>
      <h1>Apollo Space Park vous souhaite la Bienvenue!</h1>
      <h3>Une expérience mémorable!</h3>
      <h3><a href="vueReservations.html">Réservez maintenant!</a></h3>
      <p>
        "There are many variations of passage of Lorem Ipsum available, but
        the majority have suffered altertion in some form, by injected humour,
        or randomised words which don't look even slightly believable."
      </p>
    </article>
    <img id="decollage" src="../contenu/images_fR/Apollo8Launch.jpg" alt="Appolo8launch">
    <img id="image_park" src="../contenu/images_fR/image_park.png" alt="image_park">
    <p></p>
  </div>

  <!-- footer  -->
  <?php include('footer.php'); ?>



</body>

</html>