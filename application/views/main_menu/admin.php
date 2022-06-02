    <!-- <div class="alert alert-success" role="alert">
        Selamat Datang <?= $user['username']; ?> di Dashboard Admin
        <hr>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-cogs"></i> Control Panel
        </button>
    </div> -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <!-- <h3>
        <center>Selamat Datang di Aplikasi Akademik SESKOAL</center>
    </h3> -->

    <div class="container-fluid">

    <div class="align-items-center mb-4">
        <center><h1 class="h3 mb-0 text-gray-800">Selamat Datang di Aplikasi Akademik SESKOAL</h1></center>
    </div>

    <div class="row d-flex justify-content-center">
        <!-- Ruangan Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Ruangan Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kosong; ?></div>
                        </div>
                        <div class="col-auto">
                           <i class="fas fa-door-open fa-2x text-gray-300"></i> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pengumuman Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Pengumuman Aktif</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengumuman; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <div id="blokgrafik"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-md-12">
                    <div id="blokgrafik2"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Highcharts.chart('blokgrafik', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Persentase Jumlah Mahasiswa Per Diklat'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: "Brands",
                colorByPoint: true,
                data: [
                    <?php echo $grafik; ?>
                ] 
            }]
        });
    </script>


    <script type="text/javascript">
        Highcharts.chart('blokgrafik2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Persentase Jumlah Mahasiswa dan Dosen'
            },
            tooltip: {
                point2Format: '{series.name}: <b> {point2.valueText}'
                
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>:{point.percentage:.1f} % ',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    },
                  
                }
            },
            series: [{
                name: "Jumlah",
                colorByPoint: true,
                data: [{
                    name: 'Mahasiswa',
                 
                    y: <?= $mahasiswa;?>,  

                }, {
                    name: 'Dosen',
                    y: <?= $dosen ?>,


                }]
            }]
        });
    </script>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>