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
    <h3>Détails:</h3>

    <p>Note: <?= $detailsAvis["note"] ?>/5</p>
    <p>Créé/modifié le : <?= $detailsAvis["updatedOn"] ?></p>
    <p>Titre: <?= $detailsAvis["title_avis"] ?></p>
    <textarea>Commentaires: <?= $detailsAvis["comments"] ?></textarea>
    <button type="button" class="btn btn-primary"><a href="../controller/showAvis.php">Voir tous vos avis</a></button>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>