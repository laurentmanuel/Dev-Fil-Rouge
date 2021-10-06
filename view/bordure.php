<!-- bordure -->
<div id="bordure">
    <?php if (!isset($_SESSION["user"])) : ?>
      <span id="vertical_title">Apollo Space Park</span>
      <?php else : ?>
        <span id="vertical_title">Compte <?= $_SESSION["user"]["first_name_user"]?> <?= $_SESSION["user"]["name_user"]?></span>
        <?php endif; ?>
  </div>