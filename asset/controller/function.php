<?php
    // require "connection.php";
    include_once "connection.php";

    // function checkUser(String $email) {
    //     $conn = conn();
    //     $sql = "SELECT * FROM user WHERE email_user = '$email'";
    //     $qry = mysqli_query($conn, $sql);
    //     $check = mysqli_num_rows($qry);

    //     if ($check > 0) {
    //         return "true";
    //     } else {
    //         return "false";
    //     }
    // }

    // checkUser("hai");

    function getDataPMB(int $id_kampus) {
        $conn = conn();
        $i = 1;
        $qry_pmb = mysqli_query($conn, "SELECT * FROM pmb WHERE id_kampus = '$id_kampus'");

        while ($key = mysqli_fetch_array($qry_pmb)) {
            $id_pmb = $key['id_pmb'];
            $tahun_target_pmb = $key['tahun_target_pmb'];
            $tahun_realisasi_pmb = $key['tahun_realisasi_pmb'];
            $id_kampus = $key['id_kampus'];
            $id_target = $key['id_target'];
            $id_realisasi = $key['id_realisasi'];

            echo "<tr>";
            echo "<td>".$i++."</td>";
            echo "<td>Target $tahun_target_pmb</td>";
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
            echo "<td>".$i++."</td>";
            echo "<td>Realisasi $tahun_realisasi_pmb</td>";
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

            
        }
    }

    function getNilaiPMBTargetRealisasi() {
        $conn = conn();

        if (isset($_GET['id_target'])) {
            $id_target = $_GET['id_target'];
            $qry_target = mysqli_query($conn, "SELECT * FROM target WHERE id_target = $id_target");

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

                formEditPMB($januari_target, $februari_target, $maret_target, $april_target, $mei_target, $juni_target, $juli_target, $agustus_target, $september_target, $oktober_target, $november_target, $desember_target, 1);
            
                $qry_kampus_target = mysqli_query($conn, "SELECT id_kampus FROM pmb WHERE id_target = '$id_target' LIMIT 1");
                $id_kampus_target = mysqli_fetch_assoc($qry_kampus_target);
                updatePMBTarget($id_target, $id_kampus_target['id_kampus']);
            }
        }

        if (isset($_GET['id_realisasi'])) {
            $id_realisasi = $_GET['id_realisasi'];
            $qry_realisasi = mysqli_query($conn, "SELECT * FROM realisasi WHERE id_realisasi = $id_realisasi");

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

                formEditPMB($januari_realisasi, $februari_realisasi, $maret_realisasi, $april_realisasi, $mei_realisasi, $juni_realisasi, $juli_realisasi, $agustus_realisasi, $september_realisasi, $oktober_realisasi, $november_realisasi, $desember_realisasi, 2);
            
                $qry_kampus_realisasi = mysqli_query($conn, "SELECT id_kampus FROM pmb WHERE id_realisasi = '$id_realisasi' LIMIT 1");
                $id_kampus_realisasi = mysqli_fetch_assoc($qry_kampus_realisasi);
                updatePMBRealisasi($id_realisasi , $id_kampus_realisasi['id_kampus']);
            }
        }
    }

    function formEditPMB(int $jan, int $feb, int $mar, int $apr, int $mei, int $jun, int $jul, int $ags, int $sep, int $okt, int $nov, int $des, int $statusPMB)
    {
        /*
            status 1 untuk target
            status 2 untuk realisasi
        */
        ?>
        <div class="form-group">
            <h6>September : </h6>
            <input type="number" name="september" value="<?php echo $sep; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Oktober : </h6>
            <input type="number" name="oktober" value="<?php echo $okt; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
           <h6>November : </h6>
            <input type="number" name="november" value="<?php echo $nov; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Desember : </h6>
            <input type="number" name="desember" value="<?php echo $des; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Januari : </h6>
            <input type="number" name="januari" value="<?php echo $jan; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Februari : </h6>
            <input type="number" name="februari" value="<?php echo $feb; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Maret : </h6>
            <input type="number" name="maret" value="<?php echo $mar; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>April : </h6>
            <input type="number" name="april" value="<?php echo $apr; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Mei : </h6>
            <input type="number" name="mei" value="<?php echo $mei; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Juni : </h6>
            <input type="number" name="juni" value="<?php echo $jun; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Juli : </h6>
            <input type="number" name="juli" value="<?php echo $jul; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
            <h6>Agustus : </h6>
            <input type="number" name="agustus" value="<?php echo $ags; ?>" class="form-control form-control-user" id="exampleInputNumber" aria-describedby="emailHelp" required>
        </div>
        <?php
            if ($statusPMB == 1) {
                ?>
                <div class="form-group">
                    <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="updatePMBTarget" class="form-control form-control-user" value="Update Target">
                </div>
                <?php
            } else {
                ?>
                <div class="form-group">
                    <input style="background-color: blueviolet; color: white; font-weight: bold;" type="submit" name="updatePMBRealisasi" class="form-control form-control-user" value="Update Realisasi">
                </div>
                <?php
            }
    }

    function updatePMBTarget(int $id_target, int $id_kampus) {
        $conn = conn();

        if (isset($_POST['updatePMBTarget'])) {
            $september = $_POST['september'];
            $oktober = $_POST['oktober'];
            $november = $_POST['november'];
            $desember = $_POST['desember'];
            $januari = $_POST['januari'];
            $februari = $_POST['februari'];
            $maret = $_POST['maret'];
            $april = $_POST['april'];
            $mei = $_POST['mei'];
            $juni = $_POST['juni'];
            $juli = $_POST['juli'];
            $agustus = $_POST['agustus'];

            $qry = mysqli_query($conn, 
                "UPDATE target SET 
                    september_target = $september,
                    oktober_target = $oktober, 
                    november_target = $november, 
                    desember_target = $desember, 
                    januari_target = $januari, 
                    februari_target = $februari, 
                    maret_target = $maret, 
                    april_target = $april, 
                    mei_target = $mei, 
                    juni_target = $juni, 
                    juli_target = $juli, 
                    agustus_target = $agustus WHERE id_target = $id_target");

            if ($qry) {
                $qry_inten = mysqli_query($conn, "SELECT id_pmb from pmb WHERE id_target = '$id_target' AND id_kampus = '$id_kampus' LIMIT 1");
                while ($key = mysqli_fetch_assoc($qry_inten)) {
                    $id = "pmbData.php?id_pmb=".$key['id_pmb'];
                    echo "<script>window.location.href = '$id'</script>";
                }
            } else {
                toastMessage("Gagal Memperbaruhi Data");
            }
        }
    }

    function updatePMBRealisasi(int $id_realisasi, int $id_kampus) {
        $conn = conn();

        if (isset($_POST['updatePMBRealisasi'])) {
            $september = $_POST['september'];
            $oktober = $_POST['oktober'];
            $november = $_POST['november'];
            $desember = $_POST['desember'];
            $januari = $_POST['januari'];
            $februari = $_POST['februari'];
            $maret = $_POST['maret'];
            $april = $_POST['april'];
            $mei = $_POST['mei'];
            $juni = $_POST['juni'];
            $juli = $_POST['juli'];
            $agustus = $_POST['agustus'];

            $qry = mysqli_query($conn, 
                "UPDATE realisasi SET 
                    september_realisasi = $september,
                    oktober_realisasi = $oktober, 
                    november_realisasi = $november, 
                    desember_realisasi = $desember, 
                    januari_realisasi = $januari, 
                    februari_realisasi = $februari, 
                    maret_realisasi = $maret, 
                    april_realisasi = $april, 
                    mei_realisasi = $mei, 
                    juni_realisasi = $juni, 
                    juli_realisasi = $juli, 
                    agustus_realisasi = $agustus WHERE id_realisasi = $id_realisasi");
            
            if ($qry) {
                $qry_inten = mysqli_query($conn, "SELECT id_pmb from pmb WHERE id_realisasi = '$id_realisasi' AND id_kampus = '$id_kampus' LIMIT 1");
                while ($key = mysqli_fetch_assoc($qry_inten)) {
                    $id = "pmbData.php?id_pmb=".$key['id_pmb'];
                    echo "<script>window.location.href = '$id'</script>";
                }
            } else {
                toastMessage("Gagal Memperbaruhi Data");
            }
        }
    }

    function test() {
        echo "Hello World";
    }

    function toastMessage(String $message) {
        echo "<script>alert('$message');</script>";
    }

    function toastMessageWithPrevPage(String $message) {
        echo "<script>alert('$message'); window.history.go(-2); </script>";
    }

    function toastMessageIntent(String $context, String $message) {
        echo "<script>alert('$message'); window.location.href='$context';</script>";
    }
?>