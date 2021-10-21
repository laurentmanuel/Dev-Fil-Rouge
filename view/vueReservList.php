<?php
if (!isset($_SESSION["user"])) {
  session_start();
}
$titre = "Vos réservations";
include("head.php");
?>
<body>
  <!-- bordure -->
  <?php include "bordure.php"; ?>
  <!-- header -->
  <?php include("header.php"); ?>
  <div class="container">
    <section>
    <?php if($allResByUser == null) : ?>
        <h3>Aucune réservation n'a été enregistrée</h3>
      <?php else : ?>
        <?php include("tableReserv.php"); ?>
      <?php endif; ?>   
           <button type="button" class="styled"><a href="../view/vueReservPost.php">Ajouter une réservation</a></button>
           <?php if (isset($_SESSION["message"]) && $_SESSION["errorStatus"]==false): ?>
             <div class="okTable">
               <?php
               echo $_SESSION["message"];
               unset($_SESSION["message"]);
               unset($_SESSION["errorStatus"]);
               ?>
             </div>
           <?php else : ?>
             <div class="errTable">
               <?php
               echo $_SESSION["message"];
               unset($_SESSION["message"]);
               unset($_SESSION["errorStatus"]);
               ?>
             </div>
           <?php endif; ?>
    </section>
  </div>
  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>