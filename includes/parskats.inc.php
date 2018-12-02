<?php
// ==========TIEK PĀRBAUDĪTS VAI LIETOTOĀJS IR IELOGOJIES==========
if (isset($_SESSION['id'])) {
?>
  <h3 id="text_bold_center">Pārskats</h3>
    <!-- ==========TIEK IZVEIDOTS PROTATIPS KĀ VARĒTU IZSKATĪTIES PĀRSKATA SADAĻA DARBINIEKAM========== -->
    <div class="container-fluid">
      <div class="row atstarpe">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">

          <ul class="nav nav-pills">
            <li><a data-toggle="pill" href="#Datums">Datums</a></li>
            <li class="active"><a data-toggle="pill" href="#Tips">Tips</a></li>
            <li><a data-toggle="pill" href="#Adrese">Adrese</a></li>
          </ul>
          <!-- ==========DARIBNIEKAM BŪTU IESPĒJAMS SAŅEMTOS UZDEVUMUS KATEGORIZĒT PĒC DATUMA========== -->
          <div class="tab-content">
            <div id="Datums" class="tab-pane fade">
              <a href="#" class="list-group-item">07.08.2018<span class="badge">1</span></a>
              <a href="#" class="list-group-item">Nav norādīts<span class="badge">16</span></a>
            </div>
            <!-- ==========DARIBNIEKAM BŪTU IESPĒJAMS SAŅEMTOS UZDEVUMUS KATEGORIZĒT PĒC TIPA========== -->
            <div id="Tips" class="tab-pane fade in active">
              <ul class="list-group">
                <a href="#" class="list-group-item">Bezuzskaites obj. ierīkošana<span class="badge">2</span></a>
                <a href="#" class="list-group-item">Citi skaitītāju darbi<span class="badge">1</span></a>
                <a href="#" class="list-group-item">Skaitītāja noņemšana<span class="badge">1</span></a>
                <a href="#" class="list-group-item">Uzsk. pārb. Daudzdz. mājās<span class="badge">1</span></a>
                <a href="#" class="list-group-item">Uzsk.pārbaude,plombēšana<span class="badge">2</span></a>
                <a href="uzdevumi.php" class="list-group-item">Veikt skaitītāja maiņu<span class="badge">9</span></a>
                <a href="#" class="list-group-item">Zvanīt, izvērtēt atslēgšanu!<span class="badge">1</span></a>
              </ul>
            </div>
            <!-- ==========DARIBNIEKAM BŪTU IESPĒJAMS SAŅEMTOS UZDEVUMUS KATEGORIZĒT PĒC ADRESES========== -->
            <div id="Adrese" class="tab-pane fade">
              <a href="#" class="list-group-item">Jēkabpils, Nameja iela, 30<span class="badge">3</span></a>
              <a href="#" class="list-group-item">Rēzekne, Blaumaņa iela, 1<span class="badge">1</span></a>
              <a href="#" class="list-group-item">Rēzekne, Lubānas iela, 6<span class="badge">1</span></a>
              <a href="#" class="list-group-item">Rīga, Maskavas iela, 250 k-7<span class="badge">4</span></a>
              <a href="#" class="list-group-item">Rīga, Maskavas iela, 250 k-8<span class="badge">5</span></a>
              <a href="#" class="list-group-item">Rīga, Pulkveža Brieža iela, 3<span class="badge">1</span></a>
            </div>
          </div>

        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
<?php
}
?>
