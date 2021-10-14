<header>
  <!-- banniere supérieure        -->
  <a href="../view/vueAccueil.php"><img id="logo" src="../contenu/images_fR/logo/logo_ApolloSpacePark.svg.png" alt="logo_apollo_space_park" /></a>
  
  <!-- Voyant connection -->
  <span>
    <?php if (!isset($_SESSION["user"])) : ?>
      <img class="led" src="../contenu/images_fR/Button-Blank-Red-icon.png" alt="red_led">
    <?php else : ?>
      <img class="led" src="../contenu/images_fR/Button-Blank-Green-icon.png" alt="green_led">
    <?php endif; ?>
  </span>

  <!-- Navigation desktop -->
  <?php include("navbar.php"); ?>

  <!-- Navigation small devices -->
  <!-- bouton burger -->
  <div class="burgerBtn">
    <span></span>
  </div>

  <!-- Menu burger -->
  <?php include("burger.php"); ?>
  <h1 class="pgTitle"><?= $titre ?></h1>
</header>