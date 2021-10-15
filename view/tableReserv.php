<table>
  <caption>Liste des réservations de <?= $_SESSION["user"]["first_name_user"] ?> <?= $_SESSION["user"]["name_user"] ?>:</caption>
  <thead>
    <tr>
      <th class="col_res_1">#</th>
      <th class="col_res_2">Pour le :</th>
      <th class="col_res_3">Nombre:</th>
      <th class="col_res_4">Créé le:</th>
      <th class="col_res_5">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($allResByUser as $reserv) : ?>
      <tr>
        <td class="col_res_1"><?= $reserv["id_reserv"] ?></td>
        <td class="col_res_2"><?= $reserv["date_reserv"] ?></td>
        <td class="col_res_3"><?= $reserv["nb_people"] ?></td>
        <td class="col_res_4"><?= $reserv["createdOn"] ?></td>
        <td class="col_res_5">
          <div class="dropdown">
            <button class="dropbtn">Actions</button>
            <div class="dropdown-content">
              <a href="../controller/updateRes.php?id_reserv=<?= $reserv["id_reserv"] ?>">Modifier</a>
              <a href="#" role="button" data-target="#modal" data-toggle="modal">Supprimer</a>
            </div>
          </div>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- modal -->
<div class="modal" id="modal" role="dialog">
  <div class="modal-content">
    <div class="modal-close" data-dismiss="dialog">X</div>
    <div class="modal-body">
      <p>Êtes-vous sûr de vouloir supprimer la réservation?</p>
    </div>
    <div class="modal-footer">
      <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Annuler</a>
      <a href="../controller/deleteRes.php?id_reserv=<?= $reserv["id_reserv"] ?>" class="btn" role="button">Confirmer</a>
    </div>
  </div>
</div>