<table>
        <?php if (!isset($_SESSION["user"])) : ?>
          <h3>Tous les avis publiés:</h3>
        <?php else : ?>
          <caption><?= $_SESSION["user"]["first_name_user"] ?>, voici tous vos avis:</caption>
        <?php endif; ?>
        <thead>
          <tr>
            <th class="col_av_1">#</th>
            <th class="col_av_2">Note:</th>
            <th class="col_av_3">Titre:</th>
            <th class="col_av_4">Commentaires:</th>
            <th class="col_av_5">Créé/Modifié le:</th>
            <th class="col_av_6">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allAvis as $avis) : ?>
            <tr>
              <td class="col_av_1"><?= $avis["id_avis"] ?></td>
              <td class="col_av_2"><?= $avis["note"] ?></td>
              <td class="col_av_3"><?= $avis["title_avis"] ?></td>
              <td class="col_av_4"><?= $avis["comments"] ?></td>
              <td class="col_av_5"><?= $avis["updatedOn"] ?></td>
              <td class="col_av_6">
                <?php if (isset($_SESSION["user"])) : ?>
                  <div class="dropdown">
                    <button class="dropbtn">Actions</button>
                    <div class="dropdown-content">
                      <a href="../controller/detailsAvis.php?id_avis=<?= $avis["id_avis"] ?>">Détails</a>
                      <a href="../controller/updateAvis.php?id_avis=<?= $avis["id_avis"] ?>">Modifier</a>
                      <a href="../controller/deleteAvis.php?id_avis=<?= $avis["id_avis"] ?>">Supprimer</a>
                    <?php else : ?>
                      <button class="styled"><a href="../controller/detailsAvis.php?id_avis=<?= $avis["id_avis"] ?>">Détails</a></button>
                    <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </td>
            </tr>
        </tbody>
      </table>