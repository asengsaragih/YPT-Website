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
                        <a href='#' class='btn btn-warning btn-icon-split'>
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
                        <a href='#' class='btn btn-warning btn-icon-split'>
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

    function test() {
        echo "Hello World";
    }

    function toastMessage(String $message) {
        echo "<script>alert('$message');</script>";
    }

    function toastMessageIntent(String $context, String $message) {
        echo "<script>alert('$message'); window.location.href='$context';</script>";
    }
?>