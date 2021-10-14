<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Vos informations";
include("head.php");
?>

<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>

  <div class="userForm">
    <form action="../controller/updateUser.php" method="post">
      <h3 id="titleProfil">Mon Compte:<?= $_SESSION["session_mssg"] ?></h3>
      <div class="innerInputs">
        <h4>Vos Informations:</h4>
      </div>
      <div class="innerInputs">
        <label for="name">Nom:</label>
        <input type="text" placeholder="Votre nom" name="name_user" value="<?= $_SESSION["user"]["name_user"] ?>" size="25">
      </div>
      <div class="innerInputs">
        <label for="first_name">Prénom: </label>
        <input type="text" placeholder="Votre prénom" name="first_name_user" value="<?= $_SESSION["user"]["first_name_user"] ?>" size="25">
      </div>
      <div class="innerInputs">
        <label for="email">Email: </label>
        <input type="text" placeholder="Votre email" name="email_user" value="<?= $_SESSION["user"]["email_user"] ?>" size="35">
      </div>
      <div class="btnContainer">
        <div>
          <input type="hidden" name="id_user" value="<?= $_SESSION["user"]["id_user"] ?>">
          <input class="styled" type="submit" value="Modifier vos Informations" role="button" data-target="#modal" data-toggle="modal">
          <!-- <a href="#" role="button" data-target="#modal" data-toggle="modal">ouvrir modal1</a>
          <a href="#" role="button" data-target="#modal2" data-toggle="modal">ouvrir modal2</a> -->
        </div>
        <div class="dropdown">
          <div class="dropbtn">Autres actions</div>
          <div class="dropdown-content">
            <a href="../view/vueUpdateMdp.php">Modifier mot de passe</a>
            <a href="../view/vueDeleteUser.php">Supprimer mon compte</a>
          </div>
        </div> 
      </div>
    </form>
    <?php if (isset($_SESSION["status"])) : ?>
      <div class="okMssg">
        <?php
        echo $_SESSION["status"];
        unset($_SESSION["status"]);
        ?>
      </div>
    <?php else : ?>
      <div class="errMssg">
        <?php
        echo $_SESSION["status"];
        unset($_SESSION["status"]);
        ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- modal -->
    <div class="modal" id="modal" role="dialog">
      <div class="modal-content">
        <div class="modal-close" data-dismiss="dialog">X</div>
        <div class="modal-header">
          <p>Ouvrir modal 1</p>
        </div>
        <div class="modal-body">Voulez-vous enregistrer les modifications?</div>
        <div class="modal-footer">
          <a href="../controller/updateUser.php" class="btn btn-close" role="button" data-dismiss="dialog">Annuler</a>
          <a href="../view/vueAccueil.php" class="btn" role="button">Confirmer</a>
        </div> 
      </div>
    </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>