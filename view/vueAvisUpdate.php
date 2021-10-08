<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Modifier l'avis";
include("head.php");
?>
<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/updateAvis.php" method="post">
      <h3 id="avisUpdate">Modifier l'avis:</h3>
      <div>
        <label for="updateOn">Crée/modifié le: <?= $detailsAvis["updatedOn"] ?></label>
      </div>
      <div class="innerInputs">
        <label for="oldNote">Note précédente: <?= $detailsAvis["note"] ?>/5</label>
      </div>
      <div class="stars">Modifier Note:
        <i class="lar la-star" data-value="1"></i><i class="lar la-star" data-value="2"></i><i class="lar la-star" data-value="3"></i><i class="lar la-star" data-value="4"></i><i class="lar la-star" data-value="5"></i>
        <input type="hidden" name="note" id="note" value="<?= $detailsAvis["note"] ?>">
      </div>
      <div class="innerInputs">
        <label for="title">Titre: </label>
        <input type="text" name="title_avis" value="<?= $detailsAvis["title_avis"] ?>">
      </div>
      <div class="innerInputs">
        <label for="comments">Vos commentaires: </label><br>
        <textarea name="comments" id="" cols="30" rows="10"><?= $detailsAvis["comments"] ?></textarea>
      </div>
      <input type="hidden" value="<?= $detailsAvis["id_avis"] ?>" name="id_avis">
      <input class="styled"type="submit" value="Valider"></input>
      <button class="styled"><a href="../controller/showUserAvis.php">Revenir aux avis</a></button>
    </form>
    <div class="errMssg"></div>
    <div class="okMssg"></div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>

</body>

</html>