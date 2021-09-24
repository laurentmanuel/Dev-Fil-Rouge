<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Liste des avis";
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
  $avis = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
?>

<body>

  <!-- bordure -->
  <?php include "bordure.php"; ?>

  <!-- header -->
  <?php include("header.php"); ?>


  <section>
    <?php foreach ($avis as $value) : ?>
      <article>
        <p><?= htmlspecialchars($avis["title_avis"]) ?></p>
        <p>Publié le <?= $avis["updatedOn"] ?></p>
        <div>Note: <?= $avis["note"] ?></div>
        <div>Commentaires: <?= htmlspecialchars($avis["comments"]) ?></div>
      </article>
      <?php endforeach; ?>
    </section>
    
    <div class="userForm">
    <?php if (!isset($_SESSION["user"])) : ?>
      <a href="../view/vueLogin.php" class="btn btn-primary">Poster un avis</a>
    <?php else : ?>
      <a href="../view/vueAvisPost.php" class="btn btn-primary">Poster un avis</a>
    <?php endif; ?>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>