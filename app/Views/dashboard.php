<!-- Load header -->
<?= view('template/header') ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row mb-4">
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fa fa-user"></i> Total Kuesioner</h6>
                        <h5 class="card-text"><?= $jumlah_pertanyaan ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="bi bi-journal-text"></i> Total Responden</h6>
                        <h5 class="card-text"><?= $jumlah_responden ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fa fa-link"></i> Total IKM</h6>
                        <h5 class="card-text"><?= $totalIKM ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title"><i class="fa fa-link"></i> Hasil Penilaian</h6>
                        <h5 class="card-text"><?= $hasilPenilaian ?>% - <?= $label ?></h5>
                    </div>
                </div>
            </div>
        </div>

          <!-- /top tiles -->
          <div class="text-center content-center">
              <div class="row justify-content-center">
                  <div class="col-sm-12 col-sm-12">
                      <div class="dashboard_graph">
                      <div class="row x_title">
                            <div class="col-md-12">
                              <h5><b>Hasil Survei Kepuasan Masyarakat</b></h5>
                            </div>
                          </div>
                          <div class="mx-4 px-4">
                              <canvas id="barChart" width="300" height="150"></canvas>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <br />
          <br />

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h5>Persentase Responden Menurut Jenis Kelamin</h5>
                  </div>
                </div>

                <!-- <canvas id="barChart" width="400" height="200"></canvas> -->


                <div class="col-md-8 ">
                <table class="table table-bordered" id="datatable">
                      <thead style="background-color: #3498DB;">
                        <tr>
                          <th class="text-center">#</th>
                          <th class="text-center" >Jenis Kelamin</th>
                          <th class="text-center" >Responden</th>
                          <th class="text-center" >Persentase</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="text-center" >1</th>
                          <td  >Laki-Laki</td>
                          <td class="text-center" ><?= $jumlah_laki_laki ?> </td>
                          <td class="text-center" ><?= $persentase_laki_laki ?>%</td>
                        </tr>
                        <tr>
                          <th class="text-center" >2</th>
                          <td  >Perempuan</td>
                          <td class="text-center" ><?= $jumlah_perempuan ?></td>
                          <td class="text-center" ><?= $persentase_perempuan ?>%</td>
                        </tr>
                        <tr>
                          <th class="text-center" >3</th>
                          <td class="text-center">Total</td>
                          <td class="text-center"><?= $jumlah_responden ?></td>
                          <td class="text-center">100%</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
                <div class="col-md-4 col-sm-4  bg-white">
                  <div class="x_content">
                    <canvas id="mypieChart"></canvas>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <br />
          <br />

    
          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h5>Hasil Survei Responden per Soal</h5>
                  </div>
                </div>
              <div class="col-md-12 ">
                <button class="btn btn-primary mb-3" onclick="exportTableToExcel('Hasil Survei IKM')">Export to Excel</button>
                <table id="datatable-buttons" class="table table-bordered" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nilai Soal 1</th>
                <th class="text-center">Nilai Soal 2</th>
                <th class="text-center">Nilai Soal 3</th>
                <th class="text-center">Nilai Soal 4</th>
                <th class="text-center">Nilai Soal 5</th>
                <th class="text-center">Nilai Soal 6</th>
                <th class="text-center">Nilai Soal 7</th>
                <th class="text-center">Nilai Soal 8</th>
                <th class="text-center">Nilai Soal 9</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php 
            $nomorUrut = 1; // Variabel untuk nomor urut
            foreach ($dataPenilaianPerResponden as $dataPenilaian) :
            ?>
            <tr>
                <th class="text-center" scope="row"><?= $nomorUrut ?></th>
                <td><?= $dataPenilaian['nilai_soal_1'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_2'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_3'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_4'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_5'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_6'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_7'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_8'] ?? '' ?></td>
                <td><?= $dataPenilaian['nilai_soal_9'] ?? '' ?></td>
            </tr>
            <?php $nomorUrut++; // Tingkatkan nomor urut setiap kali iterasi
            endforeach; 
            ?>
            </tbody>
          </table>
          </div>
            <div class="clearfix"></div>
          </div>
          </div>
          </div>
          <br />
          <br />

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="dashboard_graph">
                <div class="row x_title">
                  <div class="col-md-12">
                    <h5>Saran Responden Terhadap Instansi</h5>
                  </div>
                </div>
              <div class="col-md-12 ">
                <!-- <button class="btn btn-primary mb-3" onclick="exportTableToExcel('Hasil Survei IKM')">Export to Excel</button> -->
                <table id="datatable-buttons" class="table table-bordered" style="width:100%">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Saran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php 
            $nomorUrut = 1; // Variabel untuk nomor urut
            foreach ($saran as $s) :
            ?>
            <tr>
                <th class="text-center" scope="row"><?= $nomorUrut ?></th>
                <td><?= $s['saran'] ?></td>
            </tr>
            <?php $nomorUrut++; // Tingkatkan nomor urut setiap kali iterasi
            endforeach; 
            ?>
            </tbody>
          </table>
          </div>
            <div class="clearfix"></div>
          </div>
          </div>
          </div>
          <br />

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/assets/vendors/moment/min/moment.min.js"></script>
    <script src="/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Datatables -->
    <script src="/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/assets/build/js/custom.min.js"></script>



    <script>
    // Data untuk diagram pie chart
    var data = {
        datasets: [{
            data: [<?= $persentaseLakiLaki ?>, <?= $persentasePerempuan ?>], // Persentase laki-laki dan perempuan
            backgroundColor: [
                "#455C73", // Warna untuk laki-laki
                "#9B59B6"  // Warna untuk perempuan
            ],
            label: 'Jumlah Responden' // untuk legenda
        }],
        labels: [
            "Laki-Laki",
            "Perempuan"
        ]
    };

    // Dapatkan elemen canvas
    var ctx = document.getElementById("mypieChart").getContext("2d");

    // Buat diagram pie chart menggunakan Chart.js
    var mypieChart = new Chart(ctx, {
        data: data,
        type: 'pie',
        options: {
            legend: {
                display: true,
                position: 'bottom'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                            return previousValue + currentValue;
                        });
                        var currentValue = dataset.data[tooltipItem.index];
                        var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                        return percentage + "%";
                    }
                }
            }
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('barChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_keys($persentasePerSoal)) ?>,
            datasets: [{
                label: 'Persentase Per Soal',
                data: <?= json_encode(array_values($persentasePerSoal)) ?>,
                backgroundColor: '#3498DB', // Warna biru
                borderColor: '#3498DB', // Warna biru
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 10,
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var value = context.raw;
                            var label = '';
                            if (value < 25) {
                                label = 'Tidak Kompeten';
                            } else if (value < 50) {
                                label = 'Kurang Kompeten';
                            } else if (value < 75) {
                                label = 'Kompeten';
                            } else {
                                label = 'Sangat Kompeten';
                            }
                            return label + '\n' + '(' + value + ')';
                        }
                    }
                }
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#datatable-buttons').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print',
                'colvis'
            ]
        });
    });
</script>

<!-- Load SheetJS (js-xlsx) dari CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<script>
    $(document).ready(function () {
        $('#datatable-buttons').DataTable();
    });

    function exportTableToExcel(filename) {
        var table = document.getElementById('datatable-buttons');
        var ws = XLSX.utils.table_to_sheet(table);
        var wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Sheet1");
        var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

        var blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });
        saveAs(blob, filename + '.xlsx');
    }

    function saveAs(blob, filename) {
        if (window.navigator.msSaveOrOpenBlob) {
            window.navigator.msSaveOrOpenBlob(blob, filename);
        } else {
            var elem = window.document.createElement('a');
            elem.href = window.URL.createObjectURL(blob);
            elem.download = filename;
            document.body.appendChild(elem);
            elem.click();
            document.body.removeChild(elem);
        }
    }

    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
</script>

	
  </body>
</html>
