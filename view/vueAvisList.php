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

  <div>
    <main class="container">
      <div class="row">
        <section class="col-10">
          <?php if (!isset($_SESSION["user"])) : ?>
            <h3>Tous les avis publiés: </h3>
          <?php else : ?>
            <h3><?= $_SESSION["user"]["first_name_user"] ?>, tous vos avis publiés:</h3>
          <?php endif; ?>
          <table class="table">
            <thead>
              <tr>
                <th>id Avis:</th>
                <th>Note attribuée:</th>
                <th>Titre:</th>
                <th>Commentaires:</th>
                <th>Créé/Modifié le:</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($allAvis as $avis) : ?>
                <tr>
                  <td><?= $avis["id_avis"] ?></td>
                  <td><?= $avis["note"] ?></td>
                  <td><?= $avis["title_avis"] ?></td>
                  <td><?= $avis["comments"] ?></td>
                  <td><?= $avis["updatedOn"] ?></td>
                  <td>
                    <?php if (isset($_SESSION["user"])) : ?>
                      <div class="dropdown">
                        <button class="dropbtn">Actions</button>
                        <div class="dropdown-content">
                          <a href="../controller/detailsAvis.php?id_avis=<?= $avis["id_avis"] ?>">Voir plus</a>
                          <a href="../controller/updateAvis.php?id_avis=<?= $avis["id_avis"] ?>">Modifier</a>
                          <a href="../controller/deleteAvis.php?id_avis=<?= $avis["id_avis"] ?>">Supprimer</a>
                        <?php else : ?>
                          <a href="../controller/detailsAvis.php?id_avis=<?= $avis["id_avis"] ?>">Voir plus</a>
                        <?php endif; ?>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </td>
                </tr>
            </tbody>
          </table>
          <?php if (!isset($_SESSION["user"])) : ?>
            <button class="styled"><a href="../view/vueLogin.php">Ajouter un avis</a></button>
            <button class="styled"><a href="../view/vueLogin.php">Voir mes avis</a></button>
          <?php else : ?>
            <button class="styled"><a href="../controller/addAvis.php">Ajouter un avis</a></button>
            <button class="styled"><a href="../controller/showAvis.php">Voir tous les avis</a></button>
          <?php endif; ?>
        </section>
      </div>
    </main>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>
</html>