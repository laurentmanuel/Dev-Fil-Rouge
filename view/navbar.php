<!-- menu Navigation -->
<nav>
  <ul>
    <li><a href="vueNews.php" class="menu__item">News</a></li>
    <li><a href="vueExplorer.php" class="menu__item">Explorer</a></li>
    <li><a href="vueReserver.php" class="menu__item">Réserver</a></li>
    <?php if (!isset($_SESSION["user"])) : ?>
      <li><a href="../view/vueInscription.php" class="menu__item">Inscription</a></li>
      <li><a href="../view/vueLogin.php" class="menu__item">Connexion</a></li>
    <?php else : ?>
      <li><a href="../view/vueProfil.php" class="menu__item">Mon compte</a></li>
      <li><a href="../utils/deconnexion.php" class="menu__item">Déconnexion</a></li>
    <?php endif; ?>
  </ul>
</nav>