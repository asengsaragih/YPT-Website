<?php
    require "connection.php";
    require "function.php";

    if (isset($_GET['id_pmb'])) {
        dataJSON($_GET['id_pmb']);
    }

    function dataJSON(int $id) {
        $conn = conn();
        $data = array();
        $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");

        while ($key = mysqli_fetch_array($qry)) {
            $id_realisasi = $key['id_realisasi'];
            $id_target = $key['id_target'];

            $qry_json = mysqli_query($conn, "
                    SELECT 
                    realisasi.september_realisasi, 
                    realisasi.oktober_realisasi, 
                    realisasi.november_realisasi,
                    realisasi.desember_realisasi, 
                    realisasi.januari_realisasi, 
                    realisasi.februari_realisasi,
                    realisasi.maret_realisasi, 
                    realisasi.april_realisasi, 
                    realisasi.mei_realisasi,
                    realisasi.juni_realisasi, 
                    realisasi.juli_realisasi, 
                    realisasi.agustus_realisasi,
                    
                    target.september_target,
                    target.oktober_target,
                    target.november_target,
                    
                    target.desember_target,
                    target.januari_target,
                    target.februari_target,
                    
                    target.maret_target,
                    target.april_target,
                    target.mei_target,
                    
                    target.juni_target,
                    target.juli_target,
                    target.agustus_target
                    
                    FROM realisasi INNER JOIN target
                    WHERE realisasi.id_realisasi = '$id_realisasi' AND target.id_target = '$id_target'
                ");

            foreach ($qry_json as $row) {
                $data[] = $row;
            }

            print json_encode($data);
        }
    }
?>