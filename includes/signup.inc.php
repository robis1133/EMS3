<?php
// ==========TIEK PĀRBAUDĪTS VAI LIETOTOĀJS IR IELOGOJIES==========
if (isset($_POST['signup-submit'])) {

  // ==========TIEK PIEVIENOTS DB SAVIENOJUMA FAILS==========
  require 'dbh.inc.php';

  // ==========TIEK IZVEIDOTI MAINĪGIE UN TIEK PAŅEMTI DATI NO REĢISTRĒŠANĀS FORMAS==========
  $username = $_POST['uid'];
  $email = $_POST['mail'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  // ==========TIEK PĀRBAUDĪTS VAI REĢISTRĒŠANĀS FORMĀ NAV TUKŠU LAUKU==========
  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
    exit();
  }
  // ==========TIEK PĀRBAUDĪTS VAI NAV IEVADĪTS NEPAREIZ E-PASTS UN LIETOTĀJA VĀRDS==========
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invaliduidmail");
    exit();
  }
  // ==========TIEK PAPILDUS PAŖBAUDĪTS LIETOTĀJA VĀRDA PAREIZIMA, SIMBOLI UN CIPARI==========
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signup.php?error=invaliduid&mail=".$email);
    exit();
  }
  // ==========TIEK PĀRBAUDĪTS VAI NAV IEVADĪTS NEKOREKTS E-PASTS==========
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signup.php?error=invalidmail&uid=".$username);
    exit();
  }
  // ==========TIEK PĀRBAUDĪTS VAI SAKRĪT PIRMĀ UN OTRĀ IEVADĪTĀ PAROLE==========
  else if ($password !== $passwordRepeat) {
    header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
    exit();
  }
  else {
    // ==========TIEK PĀRBAUDĪTS VAI IEVADĪTAIS LIETOTĀJA VĀRDS NESAKRĪT AR KĀDU KURŠ JAU IR DATU BĀZĒ==========
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    // ==========TIEK IZVEIDOTA DEKLARĀCIJA==========
    $stmt = mysqli_stmt_init($conn);
    // ==========TIEK SAGATAVOTA SQL DEKLERĀCIJA UN PĀRVAUDĪTS VAI NAV KĀDU KĻŪDU==========
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // ==========JA IR KĀDĀ KĻŪDA, TAD LIETOTĀJS TIEK NOSŪTĪTS ATPAKAĻ UZ REĢISTRĀCIJAS LAPU==========
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      // ==========TIEK NORĀDĪTI PARAMETRI KURUS MĒS CERAM SAŅEMT NO LIETOTĀJA==========
      mysqli_stmt_bind_param($stmt, "s", $username);
      // ==========TIEK IZPILDĪTI PROCESI UN DATI NOSŪTĪT UZ DATU BĀZI==========
      mysqli_stmt_execute($stmt);
      // ==========TIEK SAGLABĀTI DATI==========
      mysqli_stmt_store_result($stmt);
      // ==========TIEK PĀRBAUDĪTS SAŅEMTO DATU DAUDZUMS, TĀDĀ VEIDĀ SAPROTOT VAI TĀDS LIETOTĀJS JAU IR==========
      $resultCount = mysqli_stmt_num_rows($stmt);
      // ==========TIEK AIZVERTI SAŅEMTIE DATI==========
      mysqli_stmt_close($stmt);
      // ==========TE TIEK PĀRBAUDĪTS VAI LIETOTĀJA VĀRDS EKSISTĒ==========
      if ($resultCount > 0) {
        header("Location: ../signup.php?error=usertaken&mail=".$email);
        exit();
      }
      else {
        // ==========TIEK SAGATAVOTI DATI NOSŪTĪŠANAI UZ DATU BĀZI, VĒLĀK TIKS AIZVIETOTI PLACEHOLDERI > ? AR ĪSTAJIEM DATIEM==========
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?);";
        // ==========TIEK IZEIDOTA JAUNA DEKLERĀCIJA PRIEKŠ SAVINOJUMA AR DATU BĀZI==========
        $stmt = mysqli_stmt_init($conn);
        // ==========TIEK PĀRBAUDĪTS VAI NAV KĀDU KĻŪDU==========
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          // ==========JA IR KĀDĀ KĻŪDA, TAD LIETOTĀJS TIEK NOSŪTĪTS ATPAKAĻ UZ REĢISTRĀCIJAS LAPU==========
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {
          // ==========PIRMS DATU NOSŪTĪŠANAS UZ DATU BĀZI, NEPEICIEŠAMS SĀKUMĀ KRIPTĒT PAROLI, PAROLES KRIPTĒŠANAS METODE IR JAUNĀKĀ UN TĀ BŪS VIENMĒR JAUNĀKĀ, JO TIKLĪDZ TĀ TIKS ATJAUNOTA, TĀ ARĪ TE BŪS ATJAUNOTA==========
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          // ==========TIEK PIEFIKSĒTI NEPIECIEŠAMIE DATI UN TIE TIEK PAŅEMTI NO LIETOTĀJA==========
          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          // ==========TIEK IZPILDĪTI PROCESI UN TIEK NOSŪTĪTI DATI UZ DATU BĀZI==========
          mysqli_stmt_execute($stmt);
          // ==========LIETOTOĀJS TIEK NOSŪTĪTS ATPAKAĻ UZ REĢISTRĒŠANAŠ LAPU AR PAZIŅOJUMU PAR VEIKSMĪGU REĢISTRĀCIJU==========
          header("Location: ../signup.php?signup=success");
          exit();

        }
      }
    }
  }
  // ==========TIEK AIZVĒRTS SAVIENOJUMS AR DATU BĀZI==========
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  // ==========JA LIETOTĀJS MĒĢINA PIEKĻŪT LAPAI PA NEPAREIZU CEĻU, TAD LIETOTĀJS TIEK NOSŪTĪTS ATPAKAĻ UZ SĀKUMA LAPU==========
  header("Location: ../signup.php");
  exit();
}
