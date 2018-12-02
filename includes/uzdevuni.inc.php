<?php
  $search = "";
  if(isset($_GET["search"]))
  {
    $search = $_GET["search"];
  }

  if($conn) {
    $where = "";
    if($search != "")
      $where = " where vards like '%" . $search . "%'" .
        " or " .
        "cena like '%" . $search . "%'" .
        " or " .
        "apraksts like '%" . $search . "%'";
      $sql = "SELECT idUzd, iemesls, adrese, atr_vieta, veca_sk_numurs, veca_sk_statuss,
              mainas_iemesls, wtsum_rad, wtsum_rad_nonems, spriegums, zimju_sk, sk_tips,
              sk_numurs, izgatavosanas_gads, verifi_datums, atr_vieta_jauna FROM uzdevumi ". $where;

      $result = mysqli_query($conn, $sql);
      if($result)
      {

      }
      else
      {
    //=========== TIEK AIZVERTS SAVIENOJUMS AR DATU BAZI ===========
        mysqli_close($conn);
        $conn = false;
      }
  }
?>

<?php
// ==========TIEK PĀRBAUDĪTS VAI LIETOTOĀJS IR IELOGOJIES==========
if (isset($_SESSION['id'])) {
?>
  <h3 id="text_bold_center">Uzdevumi</h3>
    <!-- ==========TIEK IZVEIDOTS PROTATIPS KĀ VARĒTU IZSKATĪTIES PĀRSKATA SADAĻA DARBINIEKAM========== -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
        </div>

        <div class="col-sm-4">
          <?php
          if($result)
          {
              while($record = mysqli_fetch_array($result))
          {
          ?>
          <ul class="list-group">
            <a class="list-group-item" href="uzdevumuInfo.php?idUzd=<?php echo $record["idUzd"]; ?>"><b>Tips:</b> <?php echo $record["iemesls"]; ?> </br> <b>Adrese:</b> <?php echo $record["adrese"]; ?></a>
          </ul>
          <?php
          }
          }
          ?>
        </div>

        <div class="col-sm-4">
        </div>
      </div>
    </div>
<?php
}
?>
