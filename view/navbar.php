<!-- menu Navigation -->
<nav>
  <ul>
    <li><a href="vueNews.php" class="menu__item">News</a></li>
    <li><a href="vueExplorer.php" class="menu__item">Explorer</a></li>
    <li><a href="vueReservations.php" class="menu__item">Réserver</a></li>
    <?php if (!isset($_SESSION["user"])) : ?>
      <li><a href="../view/vueLogin.php" class="menu__item">Mon Compte</a></li>
    <?php else : ?>
      <li><a href="../utils/deconnexion.php" class="menu__item">Se déconnecter</a></li>
    <?php endif; ?>
  </ul>
</nav>