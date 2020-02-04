<?php
    include ("main/side.php");
    require "asset/controller/connection.php";
    require "asset/controller/function.php";
?>
 <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Input PMB</h1><br />

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Input Data PMB</h6>
            </div>
            <div class="card-body">
                <form class="user" method="POST">
                    <div class="form-group">
                        <h6>Tahun Target</h6>
                        <select name="year" class="custom-select custom-select-sm form-control form-control-sm">
                            <?php
                                for ($i=1999; $i < 2100 ; $i++) {
                            ?>
                            <option value="<?php echo $i; ?>" <?php getCurrentYear($i); ?> ><?php echo $i; ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h6>Nama Kampus : </h6>
                        <select name="campus" class="custom-select custom-select-sm form-control form-control-sm" required>
                            <?php
                                getAllCampusData();
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <h6>Nama Kampus : </h6>
                        <select name="category" class="custom-select custom-select-sm form-control form-control-sm" required>
                            <option value="1">Pendaftar</option>
                            <option value="2">Registrasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="addData" class="form-control form-control-user" value="Add PMB">
                    </div>
                  </form>
            </div>
          </div>

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
                      <th>Penyedia</th>
                      <th>Tahun Target</th>
                      <th>Tahun Realisasi</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        showDataPMB();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php
    include ("main/footer.php");
    if (isset($_POST['addData'])) {

        $year = $_POST['year'];
        $campus = $_POST['campus'];
        $categoty = $_POST['category'];

        checkPMB($year, $campus, $categoty);
    }

    function checkPMB(int $year, int $id_campus, int $kategory) {
        $conn = conn();
        $sql = "SELECT * FROM pmb WHERE tahun_target_pmb = '$year' AND id_kampus = '$id_campus' AND kategori_pmb = '$kategory'";
        $qry = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($qry);

        if ($check > 0) {
            toastMessageIntent("laporanPMB.php", "Data Sudah Ada");
        } else {
            insertPMB($year, $id_campus, $kategory);
        }
    }

    function insertPMB(int $year, int $id_campus, int $category) {
        $conn = conn();

        $realisasiYear = $year - 1;
        $targetYear = $year;

        $qryTarget = mysqli_query($conn, "INSERT INTO target (tahun_target) VALUE ('$targetYear')");
        $qryRealisasi = mysqli_query($conn, "INSERT INTO realisasi (tahun_realisasi) VALUE ('$realisasiYear')");

        if ($qryTarget) {
            if ($qryRealisasi) {
                
                $getIdRealisasi = mysqli_query($conn, "SELECT id_realisasi FROM realisasi ORDER BY id_realisasi DESC LIMIT 1");
                $getIdTarget = mysqli_query($conn, "SELECT id_target FROM target ORDER BY id_target DESC LIMIT 1");

                $key_id_realisasi = mysqli_fetch_assoc($getIdRealisasi);
                $key_id_target = mysqli_fetch_assoc($getIdTarget);

                $last_id_realisasi = $key_id_realisasi['id_realisasi'];
                $last_id_target = $key_id_target['id_target'];

                $qryPMB = mysqli_query($conn, "INSERT INTO pmb (tahun_target_pmb, tahun_realisasi_pmb, kategori_pmb, id_kampus, id_target, id_realisasi) VALUES ('$targetYear', '$realisasiYear', '$category', '$id_campus', '$last_id_target', '$last_id_realisasi')");
                
                if ($qryPMB) {
                    toastMessageIntent("inputPMB.php","Berhasil Membuat Data PMB");
                }
            }
        }
    }
    
    function getCurrentYear(String $year) {
        $currentYear = date("Y");

        $selectedFalse = "";
        $selectedtrue = "selected='selected'";

        if ($year == $currentYear) {
            echo $selectedtrue;
        } else {
            echo $selectedFalse;
        }
    }

    function getAllCampusData() {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT * FROM kampus");
        while ($key = mysqli_fetch_array($qry)) {
            $id_campus = $key["id_kampus"];
            $name_campus = $key["nama_kampus"];
            echo "<option value='$id_campus'>$name_campus</option>";
        }
    }

    function showDataPMB()
    {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT * FROM pmb");
        $i = 1;

        while ($key = mysqli_fetch_array($qry)) {
            $id = $key['id_pmb'];
            $category = $key['kategori_pmb'];
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><a href="<?php echo "pmbData.php?id_pmb=".$id; ?>"><?php showCampusName($key['id_kampus']); ?></a></td>
                    <td><?php echo $key['tahun_target_pmb'] ?></td>
                    <td><?php echo $key['tahun_realisasi_pmb'] ?></td>
                    <td><?php
                        if ($category == 1) {
                            echo "Pendaftar";
                        } else {
                            echo "Registrasi";
                        }
                        ?></td>
                    <td>
                        <form class="user" method="POST">
                            <input style="display: none;" type="number" value="<?php echo $key['id_pmb']; ?>" name="id_pmb">
                            <i class="fas fa-trash">
                                <input style="padding: 10px;" type="submit" name="deleteData" class="btn btn-danger btn-icon-split" value="Delete PMB">
                            </i>
                        </form>
                    </td>
                </tr>
            <?php
        }

        if (isset($_POST['deleteData'])) {
            $id_pmb = $_POST['id_pmb'];
            $qry_remove = mysqli_query($conn, "DELETE FROM pmb WHERE id_pmb = '$id_pmb'");
            if ($qry_remove) {
                toastMessageIntent("inputPMB.php", "Berhasil Menghapus Data");
            } else {
                toastMessage("Gagal Menghapus Data");
            }
        }
    }

    function showCampusName(int $id_campus)
    {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT nama_kampus FROM kampus WHERE id_kampus = '$id_campus'");
        $key = mysqli_fetch_assoc($qry);
        echo $key['nama_kampus'];
    }
?>