<?php
include ("main/side.php");
require "asset/controller/connection.php";
require "asset/controller/function.php";
?>

<!-- Collapsable Card Example -->
<div class="card shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Benchmark Data</h6>
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
                <h6 class="m-0 font-weight-bold text-primary">Data 1</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="multiAxisChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data 2</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="multiAxisChart"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

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

    if ($dataOne == $dataTwo) {
        toastMessage("Data 1 dan 2 harus beda");
        return;
    }


}

function showChart(int $one, int $two) {
    $conn = conn();
}

if (isset($_GET['data_two']) != null && isset($_GET['data_one']) != null) {
//    echo "<style type='text/css'>.checkRow{display: none;}</style>";
} else {

}

?>
