<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Votre avis";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/addAvis.php" method="post">
      <h3>Déposer un avis:</h3>
      <div class="stars">Note:
        <!-- ligne 33 doit rester sur une seule ligne pour affichage étoile sans espace intermédiaires -->
        <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
        <input type="hidden" name="note" id="note" value="0">
      </div>
      <div class="innerInputs">
        <label for="title">Titre: </label>
        <input type="text" name="title_avis" size="30">
      </div>
      <div class="innerInputs">
        <label for="comments">Vos commentaires: </label><br>
        <textarea name="comments" id="" cols="30" rows="10"></textarea>
      </div>
      <button class="styled" type="submit">Valider</button>
      <button class="styled"><a href="../controller/showAvis.php">Revenir aux avis</a></button>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>