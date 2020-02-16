<?php
include ("main/side.php");
?>

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Benchmark Data Telkom University</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <form class="user" method="GET">
                <div class="form-group">
                    <h6>Data PMB 1</h6>
                    <select name="data_one" class="custom-select custom-select-sm form-control form-control-sm">
                        <?php getDataPMBKampus(1); ?>
                    </select>
                </div>
                <div class="form-group">
                    <h6>Data PMB 2</h6>
                    <select name="data_two" class="custom-select custom-select-sm form-control form-control-sm">
                        <?php getDataPMBKampus(1); ?>
                    </select>
                </div>
                <div class="form-group">
                    <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="addData" class="form-control form-control-user" value="Bandingkan Data">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row checkRow">
    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary benchmarkTitleOne">Data 1</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="bencmarkOne"></canvas>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary benchmarkTitleTwo">Data 2</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="bencmarkTwo"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="js/benchmark-chart.js"></script>

<?php
include ("main/footer.php");

function getDataPMBKampus(int $id_kampus) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_kampus = '$id_kampus'");
    while ($key = mysqli_fetch_array($qry)) {
        $category = "";
        if ($key['kategori_pmb'] == 1) {
            $category = "Pendaftar";
        } else {
            $category = "Registrasi";
        }
        ?>
        <option value="<?php echo $key['id_pmb']; ?>"><?php echo $category." - ".$key['tahun_realisasi_pmb']."/".$key['tahun_target_pmb'];?></option>
        <?php
    }
}

if (isset($_GET['addData'])) {
    $dataOne = $_GET['data_one'];
    $dataTwo = $_GET['data_two'];
    ?>
    <script>
        $(document).ready(function() {
            $(".benchmarkTitleOne").text("<?php getTitleBenchmark($dataOne); ?>");
            $(".benchmarkTitleTwo").text("<?php getTitleBenchmark($dataTwo); ?>");
        });
    </script>
    <script>
        var canvasOne = document.getElementById("bencmarkOne");
        var canvasTwo = document.getElementById("bencmarkTwo");

        //data 1
        var dataRealisasiOne = {
            label: "Realisasi",
            data: [<?php dataBencmarkRealisasiJSON($dataOne); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(78, 115, 223, 1)"
        };

        var dataTargetOne = {
            label: "Target",
            data: [<?php dataBencmarkTargetJSON($dataOne); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(223, 81, 102, 1)"
        };

        showChart(dataRealisasiOne, dataTargetOne, canvasOne);

        //data 2
        var dataRealisasiOne = {
            label: "Realisasi",
            data: [<?php dataBencmarkRealisasiJSON($dataTwo); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(78, 115, 223, 1)"
        };

        var dataTargetOne = {
            label: "Target",
            data: [<?php dataBencmarkTargetJSON($dataTwo); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(223, 81, 102, 1)"
        };

        showChart(dataRealisasiOne, dataTargetOne, canvasTwo);


    </script>
    <?php
}

function getTitleBenchmark(int $id) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
    while ($key = mysqli_fetch_array($qry)) {
        $category = "";
        if ($key['kategori_pmb'] == 1) {
            $category = "Pendaftar";
        } else {
            $category = "Registrasi";
        }

        echo $category." - ".$key['tahun_realisasi_pmb']."/".$key['tahun_target_pmb'];
    }
}

function dataBencmarkRealisasiJSON(int $id) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
    while ($key = mysqli_fetch_array($qry)) {
        $id_realisasi = $key['id_realisasi'];

        $qry_realisasi = mysqli_query($conn, "SELECT * FROM realisasi WHERE id_realisasi='$id_realisasi'");
        while ($key_realisasi = mysqli_fetch_array($qry_realisasi)) {
            $september_realisasi = $key_realisasi['september_realisasi'];
            $oktober_realisasi = $key_realisasi['oktober_realisasi'];
            $november_realisasi = $key_realisasi['november_realisasi'];
            $desember_realisasi = $key_realisasi['desember_realisasi'];
            $januari_realisasi = $key_realisasi['januari_realisasi'];
            $februari_realisasi = $key_realisasi['februari_realisasi'];
            $maret_realisasi = $key_realisasi['maret_realisasi'];
            $april_realisasi = $key_realisasi['april_realisasi'];
            $mei_realisasi = $key_realisasi['mei_realisasi'];
            $juni_realisasi = $key_realisasi['juni_realisasi'];
            $juli_realisasi = $key_realisasi['juli_realisasi'];
            $agustus_realisasi = $key_realisasi['agustus_realisasi'];

            echo
                $september_realisasi.", ".
                $oktober_realisasi.", ".
                $november_realisasi.", ".
                $desember_realisasi.", ".
                $januari_realisasi.", ".
                $februari_realisasi.", ".
                $maret_realisasi.", ".
                $april_realisasi.", ".
                $mei_realisasi.", ".
                $juni_realisasi.", ".
                $juli_realisasi.", ".
                $agustus_realisasi;
        }
    }
}

function dataBencmarkTargetJSON(int $id) {
    $conn = conn();
    $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
    while ($key = mysqli_fetch_array($qry)) {
        $id_target = $key['id_target'];

        $qry_target = mysqli_query($conn, "SELECT * FROM target WHERE id_target='$id_target'");
        while ($key_target = mysqli_fetch_array($qry_target)) {
            $september_target = $key_target['september_target'];
            $oktober_target = $key_target['oktober_target'];
            $november_target = $key_target['november_target'];
            $desember_target = $key_target['desember_target'];
            $januari_target = $key_target['januari_target'];
            $februari_target = $key_target['februari_target'];
            $maret_target = $key_target['maret_target'];
            $april_target = $key_target['april_target'];
            $mei_target = $key_target['mei_target'];
            $juni_target = $key_target['juni_target'];
            $juli_target = $key_target['juli_target'];
            $agustus_target = $key_target['agustus_target'];

            echo
                $september_target.", ".
                $oktober_target.", ".
                $november_target.", ".
                $desember_target.", ".
                $januari_target.", ".
                $februari_target.", ".
                $maret_target.", ".
                $april_target.", ".
                $mei_target.", ".
                $juni_target.", ".
                $juli_target.", ".
                $agustus_target;
        }
    }
}

if (isset($_GET['data_two']) == null && isset($_GET['data_one']) == null) {
    echo "<script>
        $(document).ready(function() {
            $('.checkRow').hide();
        });
    </script>";
}
?>
