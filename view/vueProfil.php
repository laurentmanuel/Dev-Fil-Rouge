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
    <form action="../controller/updateUser.php" method="post" name="infoForm">
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
          <button class="styled" type="button" value="Modifier vos Informations" data-target="#modal" data-toggle="modal">Modifier vos Informations</button>
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
    <?php if (isset($_SESSION["message"])) : ?>
      <div class="okMssg">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
      </div>
    <?php else : ?>
      <div class="errMssg">
        <?php
        echo $_SESSION["message"];
        unset($_SESSION["message"]);
        ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- modal -->
  <div class="modal" id="modal" role="dialog">
    <div class="modal-content">
      <div class="modal-close" data-dismiss="dialog">X</div>
      <div class="modal-body">
        <p>Voulez-vous enregistrer les modifications?</p>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-close" role="button" data-dismiss="dialog">Annuler</a>
        <a role="button" class="btn" id="confirmer">Confirmer</a>
      </div>
    </div>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>