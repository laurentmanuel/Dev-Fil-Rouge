<!-- Menu burger -->
<div class="menuBg invisible">
    <ul>
        <li><a href="vueActu.php" class="menu__item">Actualité</a></li>
        <li><a href="../view/vueAvisList.php" class="menu__item">Avis</a></li>
        <li><a href="vueReservations.php" class="menu__item">Réservations</a></li>
        <?php if (!isset($_SESSION["user"])) : ?>
            <li><a href="../view/vueInscription.php" class="menu__item">Inscription</a></li>
            <li><a href="../view/vueLogin.php" class="menu__item">Connexion</a></li>
        <?php else : ?>
            <li><a href="../view/vueProfil.php" class="menu__item">Mon compte</a></li>
            <li><a href="../utils/deconnexion.php" class="menu__item">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
</div>