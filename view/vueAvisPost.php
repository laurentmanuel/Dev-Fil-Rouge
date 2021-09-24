<?php
//head
$titre = "Déposer un avis";
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

  <h2>avis</h2>

  <form action="../controller/addAvis.php" method="post">
  <div class="stars">
    <!-- ligne 33 doit rester sur une seule ligne (pour affichage étoile sans espace intermédiaires) -->
    <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
    <input type="hidden" name="note" id="note" value="0">
  </div>
  <div>
    <label for="title">Titre</label>
    <input type="text" name="title_avis">
  </div>
  <div>
    <label for="comments">Vos commentaires</label>
    <textarea name="comments" id="" cols="30" rows="10"></textarea>
    <button type="submit">Envoyer</button>
  </div>
  </form>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>