<!-- menu Navigation -->
<nav id="navbar">
  <ul>
    <li><a href="../view/vueActu.php" class="menu__itemx">Actualité</a></li>
    <li><a href="../controller/readAvis.php" class="menu__itemx">Avis</a></li>
    <li><a href="../controller/readReserv.php" class="menu__itemx">Réservations</a></li>
    <?php if (!isset($_SESSION["user"])) : ?>
      <li><a href="../view/vueCreateUser.php" class="menu__itemx">Inscription</a></li>
      <li><a href="../view/vueLogUser.php" class="menu__itemx">Connexion</a></li>
    <?php else : ?>
      <li><a href="../view/vueProfil.php" class="menu__itemx">Mon compte</a></li>
      <li><a href="../utils/deconnexion.php" class="menu__itemx">Déconnexion</a></li>
    <?php endif; ?>
  </ul>
</nav>