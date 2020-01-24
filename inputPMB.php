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
                        <h6>Insert Password : </h6>
                        <select name="campus" class="custom-select custom-select-sm form-control form-control-sm" required>
                            <?php
                                getAllCampusData();
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="addData" class="form-control form-control-user" value="Add PMB">
                    </div>
                  </form>
            </div>
          </div>
<?php
    include ("main/footer.php");
    if (isset($_POST['addData'])) {

        $year = $_POST['year'];
        $campus = $_POST['campus'];

        checkPMB($year, $campus);
    }

    function checkPMB(int $year, int $id_campus) {
        $conn = conn();
        $sql = "SELECT * FROM pmb WHERE tahun_target_pmb = '$year' AND id_kampus = '$id_campus'";
        $qry = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($qry);

        if ($check > 0) {
            toastMessageIntent("laporanPMB.php", "Data Sudah Ada");
        } else {
            insertPMB($year, $id_campus);
        }
    }

    function insertPMB(int $year, int $id_campus) {
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

                $qryPMB = mysqli_query($conn, "INSERT INTO pmb (tahun_target_pmb, tahun_realisasi_pmb, id_kampus, id_target, id_realisasi) VALUES ('$targetYear', '$realisasiYear', '$id_campus', '$last_id_target', '$last_id_realisasi')");
                
                if ($qryPMB) {
                    toastMessage("Berhasil Membuat Data PMB");
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
?>