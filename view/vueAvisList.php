<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Tous les avis";
include("head.php");
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>



  <div class="userForm">

    <section>
      <h3>Tous les avis publiés: <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</h3>
      <table>
        <thead>
          <tr>
            <th>Note</th>
            <th>Titre : </th>
            <th>Commentaires</th>
            <th>Créé/Modifié le:</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allAvis as $avis) : ?>
            <tr>
              <td><?= $avis["id_avis"] ?></td>
              <td><?= $avis["title_avis"] ?></td>
              <td><?= $avis["comments"] ?></td>
              <td><?= $avis["updatedOn"] ?></td>
              <td>
                <?php endforeach; ?>
                <div class="dropdown">
                  <button class="dropbtn">Actions</button>
                  <div class="dropdown-content">
                    <a href="../controller/updateAvis.php">Modifier</a>
                    <a href="../controller/deleteAvis.php">Supprimer</a>
                  </div>
                </div>
              </td>
            </tr>
        </tbody>
      </table>
  </div>

  </section>
  <?php if (!isset($_SESSION["user"])) : ?>
    <a href="../view/vueLogin.php">Poster un avis</a>
  <?php else : ?>
    <a href="../view/vueAvisPost.php">Poster un avis</a>
  <?php endif; ?>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>