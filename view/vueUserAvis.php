<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Voici vos avis";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <section>
    <h3><?= $_SESSION["user"]["first_name_user"] ?>, vos avis publiés:</h3>
      <table>
        <thead>
          <tr>
            <th>Note:</th>
            <th>Titre : </th>
            <th>Commentaires:</th>
            <th>Créé/Modifié le:</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($userAvis as $avis) : ?>
            <tr>
              <td><?= $avis["note"] ?></td>
              <td><?= $avis["title_avis"] ?></td>
              <td><?= $avis["comments"] ?></td>
              <td><?= $avis["updatedOn"] ?></td>
              <td>
                <?php if (isset($_SESSION["user"])) : ?>
                  <div class="dropdown">
                    <button class="dropbtn">Actions</button>
                    <div class="dropdown-content">
                      <a href="../controller/detailsAvis.php">Voir plus</a>
                      <a href="../controller/updateAvis.php">Modifier</a>
                      <a href="../controller/deleteAvis.php">Supprimer</a>
                    <?php else : ?>
                      <a href="../controller/detailsAvis.php">Voir plus</a>
                    <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </td>
            </tr>
        </tbody>
      </table>
      <?php if (!isset($_SESSION["user"])) : ?>
        <button class="styled"><a href="../view/vueLogin.php" class="favorite styled">Ajouter un avis</a></button>
        <button class="styled"><a href="../view/vueLogin.php" class="favorite styled">Voir mes avis</a></button>
      <?php else : ?>
        <button class="styled"><a href="../controller/addAvis.php">Ajouter un avis</a></button>
        <button class="styled"><a href="../controller/showUserAvis.php">Voir mes avis</a></button>
      <?php endif; ?>
  </div>
  </section>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>