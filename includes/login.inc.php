<?php
// ==========TIEK PĀRBAUDĪTS VAI LIETOTĀJS IR IELOGOJIES==========
if (isset($_POST['login-submit'])) {

  // ==========TIEK PIEVIENOTS DB SAVIENOJUMA FAILS==========
  require 'dbh.inc.php';

  // ==========TIEK IZVEIDOTI MAINĪGIE UN TIEK PAŅEMTI DATI NO IELOGOŠANĀS FORMAS==========
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  // ==========TIEK PĀRBAUDĪTS VAI IELOGOŠANĀS FORMĀ NAV TUKŠU LAUKU==========
  if (empty($mailuid) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {
    // ==========TIKS SALĪDZINĀTA PAROLE AR DB ESOŠO UN PIRMS SALĪDZINĀŠANAS PAROLE TIKS ATKRIPTĒTA==========
    // ==========TIEK SAGATAVOTAS DEKLERĀCIJAS PRIEKŠ SQL DATU NOSŪTĪŠANAS, KĀ ARĪ TIEK NORĀDĪTI PLACEHOLDERI, LAI NEVARĒTU NOZAGT DATUS==========
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    // ==========TIEK IZVEIDOTA JAUNA DEKLERĀCIJA PRIEKŠ DB SAVIENOJUMA==========
    $stmt = mysqli_stmt_init($conn);
    // ==========TIEK PĀRBAUDĪTS VAI NAV KĻŪDAS PAZIŅOJUMU DEKLERĒTAJĀ DB SAVIENOJUMĀ==========
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      // ==========JA IR KĻŪDAS PAZIŅOJUMS, TAD LIETOTĀJS TIEK AIZSŪTĪTS ATPAKAĻ UZ SĀKUMA LAPU==========
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {

      // ==========JA NAV NEKĀDU KĻŪDU PAZIŅOJUMU DB SAVIENOJUMĀ, TAD TIEK PIELAISTS PIE IELOGOŠANĀS SKRIPTA==========
      // ==========TIEK NORĀDĪTI PARAMETRI KURUS IR NEPEICIEŠAMS SAŅEMT NO LIETOTĀJA==========
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      // ==========PĒC TAM TIEK SAŅEMTIE PARAMETRI NOSŪTĪTI UZ DATU BĀZI==========
      mysqli_stmt_execute($stmt);
      // ==========TIEK SAŅEMTS REZULTĀTS==========
      $result = mysqli_stmt_get_result($stmt);
      // ==========REZULTĀTS TIEK SAGLABĀTS MAINĪGAJĀ==========
      if ($row = mysqli_fetch_assoc($result)) {
        // ==========TIEK SALĪDZINĀTA PAROLE KURU IEVADĪJA LIETOTĀS AR DATU BĀZĒ ESOŠO==========
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        // ==========JA NESAKRĪT, TAD LIETOTĀJAM TIEK PARĀDĪTS KĻŪDAS PAZIŅOJUMS==========
        if ($pwdCheck == false) {
          // ==========JA NESAKRITA PAROLE, TAD LIETOTĀJS TIEK NOSŪTĪTS ATPAKAĻ UZ SĀKUMA LAPU==========
          header("Location: ../index.php?error=wronguidpwd");
          exit();
        }
        // ==========JA PAROLE SAKRĪT, TAD MĒS ZINĀM, KA LIETOTĀJS IR ĪSTAIS KURŠ MĒĢINA AUTORIZĒTIES==========
        else if ($pwdCheck == true) {

          // ==========TURPMĀK TIKS IZVEIDOTI SESIJAS MAINĪGIE==========
          // ==========TĀ KĀ MUMS IR LIETOTĀJA DATI, TIE TIKS SAGLABĀTI SESIJAS MAINĪGAJOS==========
          // ==========SESIJU NEPIECIEŠAMS SĀKT TE, LAI PĒC TAM VARĒTU IZVEIDOT UN SAGLABĀT SESIJAS MAINĪGOS==========
          session_start();
          // ==========TIEK IZVEIDOTI SESIJAS MAINĪGIE==========
          $_SESSION['id'] = $row['idUsers'];
          $_SESSION['uid'] = $row['uidUsers'];
          $_SESSION['email'] = $row['emailUsers'];
          // ==========LIETOTĀJS IR IELOGOJIES SISTĒMĀ UN TIEK NOSŪTĪTS UZ SĀKUMA LAPU==========
          header("Location: ../index.php?login=success");
          exit();
        }
      }
      else {
        header("Location: ../index.php?error=wronguidpwd");
        exit();
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
