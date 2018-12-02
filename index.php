<?php
  // ==========TIEK PIEVIENOTS FAILS, KURĀ IR SESIJA UN DB SAVIENOJUMS==========
  require "includes/firstLoad.inc.php";
?>

<!DOCTYPE html>
<html lang="lv">
  <!-- ==========TIEK PIEVIENOTA HEAD SADAĻA========== -->
  <?php
      include("includes/head.inc.php");
  ?>

  <body id="darbagalds" class="bg1">
    <!-- ==========TIEK PIEVIENOTA IZVĒLNE========== -->
    <?php
      include("includes\izvelne.inc.php");
    ?>

    <div class="container">
      <!-- ==========TIEK IZVADĪTI KĻŪDU PAZIŅOJUMI LAPĀ========== -->
      <?php
        if (isset($_GET['error'])) {
          if ($_GET['error'] == "emptyfields") {
            echo '<h3 class="loginerror"> Nav ievadīs lietotāja vārds vai parole! </h3>';
          }
          else if ($_GET['error'] == "sqlerror") {
            echo '<h3 class="loginerror"> Nav savienojuma ar datu bāzi! </h3>';
          }
          else if ($_GET['error'] == "wronguidpwd") {
            echo '<h3 class="loginerror"> Nepareizs lietotāja vārds vai parole! </h3>';
          }
        }
      ?>
      <!-- ==========TIEK IZVADĪTS SĀKUMA PAZIŅOJUMS, JA LIETOTĀJS NAV AUTORIZĒJIES========== -->
      <?php
      if (!isset($_SESSION['id'])) {
      ?>
      <div class="container center">
        <div class="jumbotron">
          <h1>Sveicināti!</h1>
          <h2>Lai uzsāktu darbu, lūdzu autorizējieties sistēmā izmantojot savu lietotāja vārdu un paroli!</h2>
          <p>Neskaidrību gadījumā lūdzu sazināties ar Palīdzības dienestu 677xxxxx!</p>
        </div>
      </div>
      <?php
      }
      ?>
    </div>

    <!-- ==========TIEK PIEVIENOTS DARBAGALDS AR VISIEM ELEMENTIEM========== -->
    <?php
        include("includes/darbagalds.inc.php");
    ?>

    <!-- ==========TIEK PIEVIENOTA KĀJENE, AR DARBA AUTORU========== -->
    <?php
      require "includes/footer.inc.php";
    ?>

  </body>
</html>
