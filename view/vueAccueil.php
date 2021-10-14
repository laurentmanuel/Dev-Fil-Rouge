<?php 
  session_start();
  //head
  $titre = "Accueil";
  include("head.php"); 
?>
<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>
  <main>
    <article>
      <h1>Apollo Space Park, la conquête spatiale enfin à votre portée!</h1>
      <h3>Une expérience mémorable!</h3>
      <h3><a href="../view/vueReservations.php">Réservez maintenant!</a></h3>
      <p>
        "There are many variations of passage of Lorem Ipsum available, but
        the majority have suffered altertion in some form, by injected humour,
        or randomised words which don't look even slightly believable."
      </p>
    </article>
    <img id="decollage" src="../contenu/images_fR/Apollo8Launch.jpg" alt="Appolo8launch">
    <img id="image_park" src="../contenu/images_fR/image_park.png" alt="image_park">
  </main>
  <?php include("footer.php"); ?>
</body>

</html>