<?php
    include ("main/side.php");
    require "asset/controller/connection.php";
    require "asset/controller/function.php";
    $conn = conn();
?>
        <h1 class="h3 mb-2 text-gray-800">PMB ITTP</h1><br>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Group</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Jumlah</th>
                      <th>September</th>
                      <th>Oktober</th>
                      <th>November</th>
                      <th>Desember</th>
                      <th>Januari</th>
                      <th>Februari</th>
                      <th>Maret</th>
                      <th>April</th>
                      <th>Mei</th>
                      <th>Juni</th>
                      <th>Juli</th>
                      <th>Agustus</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        getDataPMB(2);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php
    include ("main/footer.php");

    
?>