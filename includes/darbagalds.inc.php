<?php
// ==========TIEK PĀRBAUDĪTS VAI LIETOTOĀJS IR IELOGOJIES==========
if (isset($_SESSION['id'])) {
?>
  <!-- ==========TIEK ATSPOGUĻOTS, KĀ VARĒTU IZSKATĪTIES DARBAGALDS, TAS IR, TE BŪTU REDZAMI VISI IENĀKOŠIE UN APSTRĀDĀTIE UZDEVUMI DARBINIEKAM========== -->
  <h3 id="text_bold_center">Darbagalds</h3>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
          <!-- ==========PROGRESA STIENIS IR PAREDZĒTS TAM, LAI LIETOTĀJS VARĒTU SEKOT LĪDZI CIK VIŅAM IR ATLIKUSI BRĪVA VIETA SISTĒMAS KEŠATMIŅĀ========== -->
          <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
              Aizpildītais bilžu apjoms - 40%
            </div>
          </div>

          <ul class="list-group">
            <a href="#" class="list-group-item list-group-item-danger">Šodienas darbi: <span class="badge">12</span></a>
            <a href="#" class="list-group-item list-group-item-danger">Ieplānotie darbi: <span class="badge">12</span></a>
            <a href="#" class="list-group-item list-group-item-danger">Visi darbi: <span class="badge">12</span></a>

            <a href="#" class="list-group-item list-group-item-info">Pārskats: <span class="glyphicon glyphicon-chevron-right"></span></a>
            <a href="#" class="list-group-item list-group-item-info">Meklēt darbus: <span class="glyphicon glyphicon-chevron-right"></span></a>
          </ul>
          <div class="panel panel-success">
            <div class="panel-heading">Apstrādātie uzdevumi:</div>
            <div class="panel-body">Nav apstrādātu!</div>
          </div>
        </div>
        <div class="col-sm-4">
        </div>
      </div>
    </div>
<?php
}
?>
