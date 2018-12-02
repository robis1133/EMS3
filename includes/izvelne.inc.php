<!-- ==========TIEK IZVEIDOTA IZVĒLNE========== -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="index.php">
        <img class="header-logo" src="img/logo.png" alt="MK logo">
      </a>
    </div>
    <?php
    // ==========TIEK PĀRBAUDĪTS VAI LEITOTĀJS IR IELOGOJIES, ŠĪS POGAS IR REDZAMAS TIKAI TAD JA LIETOTĀJS IR IELOGOJIES==========
    if (isset($_SESSION['id'])) {
    ?>
      <ul class="nav navbar-nav">
        <li class="btn-menu"><a href="index.php">Darbagalds</a></li>
        <li class="btn-menu"><a href="parskats.php">Pārskats</a></li>
        <li class="btn-menu"><a href="#">Meklēt</a></li>
        <li class="btn-menu"><a href="#">Iespējas</a></li>
      </ul>
    <?php
    }
    ?>

    <ul class="nav navbar-nav navbar-right vertical-center">
      <?php
      // ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJS IR IELOGOJIES, AUTORIZĀCIJAS FORMA PARĀDĀS TIKAI TAD, JA LIETOTĀJS NAV IELOGOJIES==========
      if (!isset($_SESSION['id'])) {
      ?>
        <li>
          <p class="navbar-btn prelogin"> Autorizēties sistēmā: 	&nbsp;	&nbsp;</p>

        </li>
        <li>
          <form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <button type="submit" name="login-submit" class="btn btn-danger navbar-btn btn-login">Sākt darbu</button>
          </form>
        </li>
        <li>
          <a href="signup.php" class="header-signup">Signup</a>
        </li>
      <?php
      }
      ?>

      <?php
      // ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJS IR IELOGOJIES UN IZLOGOŠANĀS POGA PARĀDĀS TIKAI TAD, JA LIETOTĀJS IR IELOGOJIES==========
      if (isset($_SESSION['id'])) {
      ?>
        <li>
          <form action="includes/logout.inc.php" method="post">
            <button class="btn btn-danger navbar-btn" type="submit" name="login-submit">Logout</button>
          </form>
        </li>'
      <?php
      }
      ?>

    </ul>
  </div>
</nav>
