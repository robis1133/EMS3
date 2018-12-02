<?php

  if($conn)
  {
//================= TIEK IZVEIDOTS QUERY ====================
        $sql = "SELECT idUzd, iemesls, adrese, atr_vieta, veca_sk_numurs, veca_sk_statuss,
                mainas_iemesls, wtsum_rad, wtsum_rad_nonems, spriegums, zimju_sk, sk_tips,
                sk_numurs, izgatavosanas_gads, verifi_datums, atr_vieta_jauna FROM uzdevumi
                where idUzd='" . $_GET["idUzd"] . "'";
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
  <h3 id="text_bold_center">Uzdevuma informācija</h3>
    <!-- ==========TIEK IZVEIDOTS PROTATIPS KĀ VARĒTU IZSKATĪTIES PĀRSKATA SADAĻA DARBINIEKAM========== -->
    <div class="container-fluid">
      <div class="row atstarpe">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6 ">

          <p>
          <?php
          if($conn == false)
          {
              echo "Connection error";
          }
          ?>
          </p>

          <?php
          if($result)
          {
          if($record = mysqli_fetch_array($result))
          {
          ?>
            <table class="table">
              <tbody>
                <tr>
                  <td class="txtBold">Iemesls:</td>
                  <td><?php echo $record["iemesls"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">Adrese:</td>
                  <td><?php echo $record["adrese"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">Atr. vieta:</td>
                  <td><?php echo $record["atr_vieta"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">Vecā sk. numurs:</td>
                  <td><?php echo $record["veca_sk_numurs"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">Vecā sk. statuss:</td>
                  <td><?php echo $record["veca_sk_statuss"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">Maiņas iemesls:</td>
                  <td>
                    <select class="form-control" name="mainas_iemesls">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">(+)WTsum rādījums:</td>
                  <td><?php echo $record["wtsum_rad"]; ?></td>
                </tr>
                <tr>
                  <td class="txtBold">(+)WTsum noņemšana:</td>
                  <td><input type="text" class="form-control" name="wtsum_nonems"></td>
                </tr>
                <tr>
                  <td class="txtBold">Spriegums:</td>
                  <td>
                    <select class="form-control" name="spriegums">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">Zīmju skaits:</td>
                  <td>
                    <select class="form-control" name="zimju_skaits">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">Skaitītāja tips:</td>
                  <td>
                    <select class="form-control" name="skaititaja_tips">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">Sk. numurs:</td>
                  <td><input type="text" class="form-control" name="sk_numurs"></td>
                </tr>
                <tr>
                  <td class="txtBold">Izgatavošanas gads:</td>
                  <td>
                    <select class="form-control" name="izg_gads">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">Verifikācijas datumms:</td>
                  <td>
                    <select class="form-control" name="veri_datums">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class="txtBold">Atr. vieta:</td>
                  <td>
                    <select class="form-control" name="atr_vieta_jaunaa">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </td>
                </tr>
              </tbody>
            </table>

            <a href="uzdevumi.php" class="center"><button class="btn btn-success" type="submit" name="login-submit">Atgriezties pie uzdevumiem</button></a>
          <?php
          }
          }
          ?>

        </div>
        <div class="col-sm-3">
        </div>
      </div>
    </div>
<?php
}
?>
