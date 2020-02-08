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

        <div class="col-xl-8 col-lg-7">

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

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chart Bulanan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <h6>Pilih Bulan : </h6>
                        <select id="monthChart" class="custom-select custom-select-sm form-control form-control-sm" required>
                            <option value="9" <?php getCurrentMonth(9); ?> >September</option>
                            <option value="10" <?php getCurrentMonth(10); ?> >Oktober</option>
                            <option value="11" <?php getCurrentMonth(11); ?> >November</option>
                            <option value="12" <?php getCurrentMonth(12); ?> >Desember</option>
                            <option value="1" <?php getCurrentMonth(1); ?> >Januari</option>
                            <option value="2" <?php getCurrentMonth(2); ?> >Februari</option>
                            <option value="3" <?php getCurrentMonth(3); ?> >Maret</option>
                            <option value="4" <?php getCurrentMonth(4); ?> >April</option>
                            <option value="5" <?php getCurrentMonth(5); ?> >Mei</option>
                            <option value="6" <?php getCurrentMonth(6); ?> >Juni</option>
                            <option value="7" <?php getCurrentMonth(7); ?> >Juli</option>
                            <option value="8" <?php getCurrentMonth(8); ?> >Agustus</option>
                        </select>
                    </div>
                    <div class="chart-bar pt-4">
                        <canvas id="multiBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var id = document.getElementById("monthChart");
        id.addEventListener("click", function () {
            if (id.value === "9") {
                showChart(9);
            }

            if (id.value === "10") {
                showChart(10);
            }

            if (id.value === "11") {
                showChart(11);
            }

            if (id.value === "12") {
                showChart(12);
            }

            if (id.value === "1") {
                showChart(1);
            }

            if (id.value === "2") {
                showChart(2);
            }

            if (id.value === "3") {
                showChart(3);
            }

            if (id.value === "4") {
                showChart(4);
            }

            if (id.value === "5") {
                showChart(5);
            }

            if (id.value === "6") {
                showChart(6);
            }
            
            if (id.value === "7") {
                showChart(7);
            }
            
            if (id.value === "8") {
                showChart(8);
            }

        });
        
        function showChart(month) {

            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            var dataMonth;
            var dataFull;
            var dataGabungan;

            dataFull = {
                label: "Data Tahunan",
                data: [<?php totalfullMonthPMB(idPMB()) ?>],
                backgroundColor: 'rgba(99, 132, 0, 0.6)',
                borderWidth: 0
            };

            if (month == 9) {
                dataMonth = {
                    label: "Data September",
                    data: [<?php totalOneMonthPMB(idPMB(), 9); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 10) {
                dataMonth = {
                    label: "Data Oktober",
                    data: [<?php totalOneMonthPMB(idPMB(), 10); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 11) {
                dataMonth = {
                    label: "Data November",
                    data: [<?php totalOneMonthPMB(idPMB(), 11); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 12) {
                dataMonth = {
                    label: "Data Desember",
                    data: [<?php totalOneMonthPMB(idPMB(), 12); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 1) {
                dataMonth = {
                    label: "Data Januari",
                    data: [<?php totalOneMonthPMB(idPMB(), 1); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 2) {
                dataMonth = {
                    label: "Data Februari",
                    data: [<?php totalOneMonthPMB(idPMB(), 2); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 3) {
                dataMonth = {
                    label: "Data Maret",
                    data: [<?php totalOneMonthPMB(idPMB(), 3); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 4) {
                dataMonth = {
                    label: "Data April",
                    data: [<?php totalOneMonthPMB(idPMB(), 4); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 5) {
                dataMonth = {
                    label: "Data Mei",
                    data: [<?php totalOneMonthPMB(idPMB(), 5); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 6) {
                dataMonth = {
                    label: "Data Juni",
                    data: [<?php totalOneMonthPMB(idPMB(), 6); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else if (month == 7) {
                dataMonth = {
                    label: "Data Juli",
                    data: [<?php totalOneMonthPMB(idPMB(), 7); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            } else {
                dataMonth = {
                    label: "Data Agustus",
                    data: [<?php totalOneMonthPMB(idPMB(), 8); ?>],
                    backgroundColor: 'rgba(0, 99, 132, 0.6)',
                    borderWidth: 0
                };
            }

            dataGabungan = {
                label: "Data Bulanan",
                datasets: [dataFull, dataMonth]
            };

            var chartOptions = {
                options: {
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
                                unit: 'month'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 6
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: 15000,
                                maxTicksLimit: 5,
                                padding: 10,
                                // Include a dollar sign in the ticks
                                callback: function(value, index, values) {
                                    return '$' + number_format(value);
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
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#6e707e',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, chart) {
                                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                            }
                        }
                    },
                }
            }

            var canvasChartBulanan = document.getElementById("multiBarChart");

            var barChart = new Chart(canvasChartBulanan, {
                type: 'bar',
                data: dataGabungan,
                options: chartOptions
            });
        }

    </script>

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

    function totalOneMonthPMB(int $id, int $month) {
        $conn = conn();
        $qry_intro = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
        while ($key = mysqli_fetch_array($qry_intro)) {
            $id_realisasi = $key['id_realisasi'];
            $qry = null;

            if ($month == 1) {
                $qry = mysqli_query($conn, "SELECT januari_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 2) {
                $qry = mysqli_query($conn, "SELECT februari_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 3) {
                $qry = mysqli_query($conn, "SELECT maret_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 4) {
                $qry = mysqli_query($conn, "SELECT april_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 5) {
                $qry = mysqli_query($conn, "SELECT mei_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 6) {
                $qry = mysqli_query($conn, "SELECT juni_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 7) {
                $qry = mysqli_query($conn, "SELECT juli_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 8) {
                $qry = mysqli_query($conn, "SELECT agustus_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 9) {
                $qry = mysqli_query($conn, "SELECT september_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 10) {
                $qry = mysqli_query($conn, "SELECT oktober_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 11) {
                $qry = mysqli_query($conn, "SELECT november_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            } elseif ($month == 12) {
                $qry = mysqli_query($conn, "SELECT desember_realisasi AS TOTAL FROM realisasi WHERE id_realisasi = '$id_realisasi' LIMIT 1");
            }

            while ($key = mysqli_fetch_assoc($qry)) {
                echo $key['TOTAL'];
            }
        }
    }

    function totalfullMonthPMB(int $id) {
        $conn = conn();
        $qry = mysqli_query($conn, "SELECT * FROM pmb WHERE id_pmb = '$id'");
        while ($key = mysqli_fetch_array($qry)) {
            $id_realisasi = $key['id_realisasi'];

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

                echo $total;
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

    function getCurrentMonth(int $month) {
        $currentMonth = date('m');

        $selectedFalse = "";
        $selectedtrue = "selected='selected'";

        if ($month == $currentMonth) {
            echo $selectedtrue;
        } else {
            echo $selectedFalse;
        }
    }
?>
