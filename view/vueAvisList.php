<?php
if (!isset($_SESSION["user"])) {
  session_start();
}

if (!isset($_SESSION["user"])) {
  $titre = "Tous les avis ";
} else {
  $titre = "Vos Avis";
}

include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="container">
    <section>
      <table>
      <?php if (!isset($_SESSION["user"])) : ?>     
        <caption>Tous les avis publiés:</caption>
        <?php else: ?>
        <caption><?= $_SESSION["user"]["first_name_user"] ?>, voir tous vos avis:</caption>
        <?php endif; ?>
        <thead>
          <tr>
            <th class="col_1">#</th>
            <th class="col_2">Note attribuée:</th>
            <th class="col_3">Titre:</th>
            <th class="col_4">Commentaires:</th>
            <th class="col_5">Créé/Modifié le:</th>
            <th class="col_6">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allAvis as $avis) : ?>
            <tr>
              <td class="col_1"><?= $avis["id_avis"] ?></td>
              <td class="col_2"><?= $avis["note"] ?></td>
              <td class="col_3"><?= $avis["title_avis"] ?></td>
              <td class="col_4"><?= $avis["comments"] ?></td>
              <td class="col_5"><?= $avis["updatedOn"] ?></td>
              <td class="col_6"><button class="styled"><a href="../controller/detailsAvis.php?id_avis=<?= $avis["id_avis"] ?>">Voir plus</a></button></td>
            <?php endforeach; ?>
            </tr>
        </tbody>
      </table>
      <?php if (!isset($_SESSION["user"])) : ?>
        <button class="styled"><a href="../view/vueLogin.php" class="favorite styled">Ajouter un avis</a></button>
        <button class="styled"><a href="../view/vueLogin.php" class="favorite styled">Voir mes avis</a></button>
      <?php else : ?>
        <button class="styled"><a href="../controller/addAvis.php">Ajouter un avis</a></button>
      <?php endif; ?>
    </section>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>