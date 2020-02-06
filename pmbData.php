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

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Tahunan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="multiAxisChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        var canvas = document.getElementById("multiAxisChart");
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        var dataRealisasi = {
            label: "Realisasi",
            data: [<?php dataPMBRealisasiJSON(idPMB()); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(78, 115, 223, 1)"
        };

        var dataTarget = {
            label: "Target",
            data: [<?php dataPMBTargetJSON(idPMB()); ?>],
            lineTension: 0,
            fill: false,
            borderColor: "rgba(223, 81, 102, 1)"
        };

        var labelData = {
            labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
            datasets: [dataRealisasi, dataTarget]
        };

        var chartOptions = {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 13
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    boxWidth: 80,
                    fontColor: "rgba(0,0,0,1)"
                }
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                    }
                }
            }
        };

        var lineChart = new Chart(canvas, {
            type: 'line',
            data: labelData,
            options: chartOptions
        });
    </script>

    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        //Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        //Chart.defaults.global.defaultFontColor = '#858796';
        //
        //function number_format(number, decimals, dec_point, thousands_sep) {
        //    // *     example: number_format(1234.56, 2, ',', ' ');
        //    // *     return: '1 234,56'
        //    number = (number + '').replace(',', '').replace(' ', '');
        //    var n = !isFinite(+number) ? 0 : +number,
        //        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        //        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        //        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        //        s = '',
        //        toFixedFix = function(n, prec) {
        //            var k = Math.pow(10, prec);
        //            return '' + Math.round(n * k) / k;
        //        };
        //    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        //    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        //    if (s[0].length > 3) {
        //        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        //    }
        //    if ((s[1] || '').length < prec) {
        //        s[1] = s[1] || '';
        //        s[1] += new Array(prec - s[1].length + 1).join('0');
        //    }
        //    return s.join(dec);
        //}
        //
        //// Area Chart Example
        //var ctx = document.getElementById("multiAxisChart");
        //
        //var pmb = {
        //    labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        //    datasets: [{
        //        label: 'Realisasi',
        //        backgroundColor: "rgba(78, 115, 223, 0.05)",
        //        borderColor: "rgba(78, 115, 223, 1)",
        //        lineTension: 0.3,
        //        pointRadius: 3,
        //        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        //        pointBorderColor: "rgba(78, 115, 223, 1)",
        //        pointHoverRadius: 3,
        //        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        //        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        //        pointHitRadius: 10,
        //        pointBorderWidth: 2,
        //        fill: false,
        //        data: [
        //            <?php //dataPMBRealisasiJSON(idPMB()); ?>
        //        ],
        //        yAxisID: 'xAxes',
        //    }, {
        //        label: 'Target',
        //        backgroundColor: "rgba(78, 115, 223, 0.05)",
        //        borderColor: "rgba(78, 115, 223, 1)",
        //        lineTension: 0.3,
        //        pointRadius: 3,
        //        pointBackgroundColor: "rgba(78, 115, 223, 1)",
        //        pointBorderColor: "rgba(78, 115, 223, 1)",
        //        pointHoverRadius: 3,
        //        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        //        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        //        pointHitRadius: 10,
        //        pointBorderWidth: 2,
        //        fill: false,
        //        data: [
        //            <?php //dataPMBTargetJSON(idPMB()); ?>
        //        ],
        //        yAxisID: 'yAxes'
        //    }]
        //};
        //
        //var myLineChart = new Chart(ctx, {
        //    type: 'line',
        //    data: {
        //        labels: ["Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
        //        datasets: pmb,
        //    },
        //    options: {
        //        maintainAspectRatio: false,
        //        layout: {
        //            padding: {
        //                left: 10,
        //                right: 25,
        //                top: 25,
        //                bottom: 0
        //            }
        //        },
        //        scales: {
        //            xAxes: [{
        //                time: {
        //                    unit: 'date'
        //                },
        //                gridLines: {
        //                    display: false,
        //                    drawBorder: false
        //                },
        //                ticks: {
        //                    maxTicksLimit: 7
        //                }
        //            }],
        //            yAxes: [{
        //                ticks: {
        //                    maxTicksLimit: 5,
        //                    padding: 10,
        //                    // Include a dollar sign in the ticks
        //                    callback: function(value, index, values) {
        //                        return '$' + number_format(value);
        //                    }
        //                },
        //                gridLines: {
        //                    color: "rgb(234, 236, 244)",
        //                    zeroLineColor: "rgb(234, 236, 244)",
        //                    drawBorder: false,
        //                    borderDash: [2],
        //                    zeroLineBorderDash: [2]
        //                }
        //            }],
        //        },
        //        legend: {
        //            display: false
        //        },
        //        tooltips: {
        //            backgroundColor: "rgb(255,255,255)",
        //            bodyFontColor: "#858796",
        //            titleMarginBottom: 10,
        //            titleFontColor: '#6e707e',
        //            titleFontSize: 14,
        //            borderColor: '#dddfeb',
        //            borderWidth: 1,
        //            xPadding: 15,
        //            yPadding: 15,
        //            displayColors: false,
        //            intersect: false,
        //            mode: 'index',
        //            caretPadding: 10,
        //            callbacks: {
        //                label: function(tooltipItem, chart) {
        //                    var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
        //                    return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        //                }
        //            }
        //        }
        //    }
        //});

    </script>
<?php
    include ("main/footer.php");

    function dataPMBRealisasiJSON(int $id) {
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

    function dataPMBTargetJSON(int $id) {
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
