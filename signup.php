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

  <body class="bg1" id="signup">
    <!-- ==========TIEK PIEVIENOTA IZVĒLNE========== -->
    <?php
        include("includes\izvelne.inc.php");
    ?>
    <div class="wrapper-main center">
      <h1>Signup</h1>
      <?php
      // ==========KĻŪDU PAZIŅOJUMU ZIŅOJUMI==========
      if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyfields") {
          echo '<p class="signuperror">Fill in all fields!</p>';
        }
        else if ($_GET["error"] == "invaliduidmail") {
          echo '<p class="signuperror">Invalid username and e-mail!</p>';
        }
        else if ($_GET["error"] == "invaliduid") {
          echo '<p class="signuperror">Invalid username!</p>';
        }
        else if ($_GET["error"] == "invalidmail") {
          echo '<p class="signuperror">Invalid e-mail!</p>';
        }
        else if ($_GET["error"] == "passwordcheck") {
          echo '<p class="signuperror">Your passwords do not match!</p>';
        }
        else if ($_GET["error"] == "usertaken") {
          echo '<p class="signuperror">Username is already taken!</p>';
        }
      }
      // ==========PAZIŅOJUMS PAR TO, JA VEIKSMĪGI TIEK REĢISTRĒTS==========
      else if (isset($_GET["signup"])) {
        if ($_GET["signup"] == "success") {
          echo '<p class="signupsuccess">Signup successful!</p>';
        }
      }
      ?>
      <!-- ==========REĢISTRĀCIJAS FORMAS SĀKUMS========== -->
      <form class="form-signup" action="includes/signup.inc.php" method="post">
        <?php
        // ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJAS IR IELOGOJIES==========
        if (isset($_SESSION['id'])) {
          // ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJA VĀRDS JAU NAV AIZŅEMTS==========
          // ==========LIETOTĀJA VĀRDA PĀRBAUDE==========
          if (!empty($_GET["uid"])) {
            echo '<div class="form-group">
                    <input type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">
                  </div>';
          }
          else {
            echo '<div class="form-group">
                    <input type="text" name="uid" placeholder="Username">
                  </div>';
          }

          // ==========E-PASTA PĀRBAUDE==========
          if (!empty($_GET["mail"])) {
            echo '<div class="form-group">
                    <input type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">
                  </div>';
          }
          else {
            echo '<div class="form-group">
                    <input type="text" name="mail" placeholder="E-mail">
                  </div>';
          }
        }
        ?>

        <?php
        // ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJAS IR IELOGOJIES==========
        if (isset($_SESSION['id'])) {
        ?>
          <!-- ==========FORMAS IEVADES LAUKI UN APSTIPRINĀŠANAS POGA========== -->
          <div class="form-group">
            <input type="password" name="pwd" placeholder="Password">
          </div>
          <div class="form-group">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
          </div>
          <button type="submit" name="signup-submit">Reģistrēt</button>
        <?php
        }
        ?>
      </form>
    </div>

    <!-- ==========TIEK PIEVIENOTA KĀJENE, AR DARBA AUTORU========== -->
    <?php
      require "includes/footer.inc.php";
    ?>
  </body>
</html>
