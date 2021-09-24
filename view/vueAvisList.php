<?php
//head
session_start();
$titre = "Avis";
include("head.php");

//Connexion bdd
require("../utils/connexionBdd.php");

try {
  //Requête sql
  $sql = "SELECT * FROM avis ORDER BY updatedOn asc";


  //on éxécute la requête 
  $query = $bdd->query($sql);

  // $query->execute();

  //on va récupérer les données
  $allAvis = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <header>
    <!-- banniere supérieure        -->
    <?php include("header.php"); ?>
    <!-- Navigation desktop -->
    <?php include("navbar.php"); ?>
    <!-- bouton burger -->
    <div class="burgerBtn">
      <span></span>
    </div>
    <!-- Menu burger -->
    <?php include("burger.php"); ?>
    <h1 class="pgTitle"><?= $titre?></h1>
  </header>
  <section>
    <?php foreach ($allAvis as $avis) : ?>
      <article>
        <h2><?= htmlspecialchars($avis["title_avis"]) ?></h2>
        <p>Publié le <?= $avis["updatedOn"] ?></p>
        <div>Note: <?= $avis["note"] ?></div>
        <div>Commentaires: <?= htmlspecialchars($avis["comments"]) ?></div>
      </article>
    <?php endforeach; ?>
  </section>


  <?php if (!isset($_SESSION["user"])) : ?>
    <a href="../controller/logUser.php" class="btn btn-primary">Poster un avis</a>
  <?php else : ?>
    <a href="../controller/addAvis.php" class="btn btn-primary">Poster un avis</a>
  <?php endif; ?>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>