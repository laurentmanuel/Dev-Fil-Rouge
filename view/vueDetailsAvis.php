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
    <form action="../controller/updateAvis.php" method="post">
      <h3>Détails de l'avis:</h3>
      <div class="innerInputs">
        <label for="updateOn">Crée/modifié le: <?= $detailsAvis["updatedOn"] ?></label>
      </div>
      <div class="innerInputs">Note: <?= $detailsAvis["note"] ?>/5<br>
        <input type="hidden" name="note" id="note" value="<?= $detailsAvis["note"] ?>">
      </div>
      <div class="innerInputs">
        <label for="title">Titre: </label>
        <input type="text" name="title_avis" value="<?= $detailsAvis["title_avis"] ?>">
      </div>
      <div class="innerInputs">
        <label for="comments">Vos commentaires: </label><br>
        <textarea name="comments" id="" cols="30" rows="5"><?= $detailsAvis["comments"] ?></textarea>
      </div>
      <input type="hidden" value="<?= $detailsAvis["id_avis"] ?>" name="id_avis">
      <?php if(isset($SESSION["user"])) : ?>
      <button class="styled"><a href="../controller/showUserAvis.php">Revenir aux avis</a></button>
      <?php else: ?>
        <button class="styled"><a href="../controller/readAvis.php">Retour</a></button>
      <?php endif; ?>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>