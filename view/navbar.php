<!-- menu Navigation -->
<nav>
  <ul>
    <li><a href="vueNews.php">News</a></li>
    <li><a href="vueExplorer.php">Explorer</a></li>
    <li><a href="vueReservations.php">Réserver</a></li>
    <?php if (!isset($_SESSION["user"])) : ?>
      <li><a href="vueLogin.php">Mon Compte</a></li>
    <?php else : ?>
      <li><a href="deconnexion.php">Se déconnecter</a></li>
    <?php endif; ?>
  </ul>
</nav>