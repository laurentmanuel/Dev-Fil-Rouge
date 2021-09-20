<?php 
  session_start();
  //head
  include("head.php"); 
?>
  <title>Apollo Space Park News</title>
</head>

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
    <h1 class="pgTitle">News</h1>>
  </header>

  <!-- footer  -->
  <?php include("footer.php"); ?>
</body>

</html>