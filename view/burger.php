<!-- Menu burger -->
<div class="menuBg invisiblex">
    <ul>
        <li><a href="../view/vueActu.php" class="menu__itemy">Actualité</a></li>
        <li><a href="../view/vueAvisList.php" class="menu__itemy">Avis</a></li>
        <li><a href="../view/vueReservations.php" class="menu__itemy">Réservations</a></li>
        <?php if (!isset($_SESSION["user"])) : ?>
            <li><a href="../view/vueInscription.php" class="menu__itemy">Inscription</a></li>
            <li><a href="../view/vueLogin.php" class="menu__itemy">Connexion</a></li>
        <?php else : ?>
            <li><a href="../view/vueProfil.php" class="menu__itemy">Mon compte</a></li>
            <li><a href="../utils/deconnexion.php" class="menu__itemy">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
</div>