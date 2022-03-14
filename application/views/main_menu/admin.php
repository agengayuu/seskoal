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
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">MAHASISWA</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">MAHASISWA</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">MAHASISWA</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">MAHASISWA</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">INPUT NILAI</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">JADWAL</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">RUANGAN</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>

                        <div class="col-md-3 text-info text-center">
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">MAHASISWA</p>
                            </a>
                            <i class="fas fa-3x fa-user-graduate"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <h3>
        <center>Selamat Datang di Aplikasi Akademik SESKOAL</center>
    </h3>
    <br />
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                
                <div class="col-md-12">

                    <div id="blokgrafik"></div>
                    
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
    
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>