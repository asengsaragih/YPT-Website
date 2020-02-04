<?php
    include ("main/side.php");
    require "asset/controller/connection.php";
    require "asset/controller/function.php";
?>
    <?php showTitle(idPMB()); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Group</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <?php showData(idPMB()); ?>
                </table>
            </div>
        </div>
    </div>
<?php
    include ("main/footer.php");

    function showData(int $id) {
        $conn = conn();
        $i = 1;
        $qry_pmb = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");

        while ($key = mysqli_fetch_array($qry_pmb)) {
            $id_pmb = $key['id_pmb'];
            $tahun_target_pmb = $key['tahun_target_pmb'];
            $tahun_realisasi_pmb = $key['tahun_realisasi_pmb'];
            $id_kampus = $key['id_kampus'];
            $id_target = $key['id_target'];
            $id_realisasi = $key['id_realisasi'];
            $tahun_targer_substr = substr(strval($tahun_target_pmb), 2);
            $tahun_realisasi_substr = substr(strval($tahun_realisasi_pmb), 2);

            echo "
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Jumlah</th>
                        <th>Sep $tahun_realisasi_substr </th>
                        <th>Okt $tahun_realisasi_substr</th>
                        <th>Nov $tahun_realisasi_substr</th>
                        <th>Des $tahun_realisasi_substr</th>
                        <th>Jan $tahun_targer_substr</th>
                        <th>Feb $tahun_targer_substr</th>
                        <th>Mar $tahun_targer_substr</th>
                        <th>Apr $tahun_targer_substr</th>
                        <th>Mei $tahun_targer_substr</th>
                        <th>Jun $tahun_targer_substr</th>
                        <th>Jul $tahun_targer_substr</th>
                        <th>Agu $tahun_targer_substr</th>
                        <th>Action</th>
                    </tr>
                </thead>
            ";

            echo "<tbody>";
            echo "<tr>";
            echo "<td>Target</td>";
            $qry_target = mysqli_query($conn, "SELECT * FROM target WHERE id_target = '$id_target'");
            while ($key_target = mysqli_fetch_array($qry_target)) {
                $total = $key_target['september_target'] +
                    $key_target['oktober_target'] +
                    $key_target['november_target'] +
                    $key_target['desember_target'] +
                    $key_target['januari_target'] +
                    $key_target['februari_target'] +
                    $key_target['maret_target'] +
                    $key_target['april_target'] +
                    $key_target['mei_target'] +
                    $key_target['juni_target'] +
                    $key_target['juli_target'] +
                    $key_target['agustus_target'];
                echo "<td>".$total."</td>";
                echo "<td>".$key_target['september_target']."</td>";
                echo "<td>".$key_target['oktober_target']."</td>";
                echo "<td>".$key_target['november_target']."</td>";
                echo "<td>".$key_target['desember_target']."</td>";
                echo "<td>".$key_target['januari_target']."</td>";
                echo "<td>".$key_target['februari_target']."</td>";
                echo "<td>".$key_target['maret_target']."</td>";
                echo "<td>".$key_target['april_target']."</td>";
                echo "<td>".$key_target['mei_target']."</td>";
                echo "<td>".$key_target['juni_target']."</td>";
                echo "<td>".$key_target['juli_target']."</td>";
                echo "<td>".$key_target['agustus_target']."</td>";
                echo "<td>
                        <a href='editPMB.php?id_target=$id_target' class='btn btn-warning btn-icon-split'>
	                    	<span class='icon text-white-50'>
	                      		<i class='fas fa-edit'></i>
	                    	</span>
	                        <span class='text'>Edit</span>
                  		</a>
                    </td>";
            }
            echo "</tr>";

            echo "<tr>";
            echo "<td>Realisasi</td>";
            $qry_realisasi = mysqli_query($conn, "SELECT * FROM realisasi WHERE id_realisasi = '$id_realisasi'");
            while ($key_realisasi = mysqli_fetch_array($qry_realisasi)) {
                $total = $key_realisasi['september_realisasi'] +
                    $key_realisasi['oktober_realisasi'] +
                    $key_realisasi['november_realisasi'] +
                    $key_realisasi['desember_realisasi'] +
                    $key_realisasi['januari_realisasi'] +
                    $key_realisasi['februari_realisasi'] +
                    $key_realisasi['maret_realisasi'] +
                    $key_realisasi['april_realisasi'] +
                    $key_realisasi['mei_realisasi'] +
                    $key_realisasi['juni_realisasi'] +
                    $key_realisasi['juli_realisasi'] +
                    $key_realisasi['agustus_realisasi'];
                echo "<td>".$total."</td>";
                echo "<td>".$key_realisasi['september_realisasi']."</td>";
                echo "<td>".$key_realisasi['oktober_realisasi']."</td>";
                echo "<td>".$key_realisasi['november_realisasi']."</td>";
                echo "<td>".$key_realisasi['desember_realisasi']."</td>";
                echo "<td>".$key_realisasi['januari_realisasi']."</td>";
                echo "<td>".$key_realisasi['februari_realisasi']."</td>";
                echo "<td>".$key_realisasi['maret_realisasi']."</td>";
                echo "<td>".$key_realisasi['april_realisasi']."</td>";
                echo "<td>".$key_realisasi['mei_realisasi']."</td>";
                echo "<td>".$key_realisasi['juni_realisasi']."</td>";
                echo "<td>".$key_realisasi['juli_realisasi']."</td>";
                echo "<td>".$key_realisasi['agustus_realisasi']."</td>";
                echo "<td>
                        <a href='editPMB.php?id_realisasi=$id_realisasi' class='btn btn-warning btn-icon-split'>
	                    	<span class='icon text-white-50'>
	                      		<i class='fas fa-edit'></i>
	                    	</span>
	                        <span class='text'>Edit</span>
                  		</a>
                    </td>";
            }
            echo "</tr>";
            echo "</tbody>";
        }
    }

    function idPMB() {
        if (isset($_GET['id_pmb'])) {
            return $_GET['id_pmb'];
        }
    }

    function showTitle(int $id) {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
        while ($key = mysqli_fetch_array($qry)) {
            $tahun_target = $key['tahun_target_pmb'];
            $tahun_realisasi = $key['tahun_realisasi_pmb'];
            $kategori_name = "";
            $kategori = $key['kategori_pmb'];
            if ($kategori == 1) {
                $kategori_name = "Pendaftar";
            } else {
                $kategori_name = "Registrasi";
            }

            $nama_kampus = "";
            $kampus = $key['id_kampus'];

            if ($kampus == 1) {
                $nama_kampus = "Telkom University";
            } elseif ($kampus == 2) {
                $nama_kampus = "ITTP";
            } elseif ($kampus == 3) {
                $nama_kampus = "Akatel";
            } else {
                $nama_kampus = "ITTS";
            }

            echo "<h2 class=\'h3 mb-2 text-gray-800\'>"."PMB ".$nama_kampus." Tahun ".$tahun_realisasi."/".$tahun_target." Kategori ".$kategori_name."</h2><br>";
        }
    }
?>
