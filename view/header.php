<header>
    <!-- banniere supérieure        -->
    <a href="../view/vueAccueil.php"><img id="logo" src="../contenu/images_fR/logo/logo_ApolloSpacePark.svg.png" alt="logo_apollo_space_park" /></a>
    
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