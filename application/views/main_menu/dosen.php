
<div class="container-fluid">

    <!-- <div class="card mb-4 py-1 border-left-primary">
        <div class="card-body"> -->
            <!-- Selamat Datang <?= $user['username'];?> di Dashboard Dosen -->
            <!-- Selamat Datang di Dashboard Dosen -->
            <!-- <hr>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-cogs"></i> Control Panel
            </button>
        </div>
    </div> -->
        <!-- Modal -->
        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?php echo base_url('main_menu/dosen') ?>"><p class="nav-link small text-info">DASHBOARD</p></a>
                        <i class="fas fa-3x fa-tachometer-alt"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('informasi_akademik') ?>"><p class="nav-link small text-info">INFORMASI AKADEMIK</p></a>
                        <i class="fas fa-3x fa-bullhorn"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('mahasiswa_d') ?>"><p class="nav-link small text-info">MAHASISWA</p></a>
                        <i class="fas fa-3x fa-user-graduate"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('jadwal_kuliah_dosen') ?>"><p class="nav-link small text-info">JADWAL KULIAH</p></a>
                        <i class="fas fa-3x fa-calendar-alt"></i>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('profile_dosen') ?>"><p class="nav-link small text-info">PROFILE DOSEN</p></a>
                        <i class="fas fa-3x fa-id-card-alt"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('soal_evaluasi_ujian') ?>"><p class="nav-link small text-info">SOAL EVALUASI MAHASISWA</p></a>
                        <i class="fas fa-3x fa-book"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('peserta_evaluasi') ?>"><p class="nav-link small text-info">KELOLA MAHASISWA EVALUASI</p></a>
                        <i class="fas fa-3x fa-plus"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('hasil_mahasiswa_evaluasi') ?>"><p class="nav-link small text-info">HASIL EVALUASI</p></a>
                        <i class="fas fa-3x fa-clipboard"></i>
                    </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">PENILAIAN</p></a>
                        <i class="fas fa-3x fa-sort-numeric-down"></i>
                    </div>
                    <div class="col-md-3 text-info text-center">
                        <a href="<?php echo base_url('login/set') ?>"><p class="nav-link small text-info">SET PASSWORD</p></a>
                        <i class="fas fa-3x fa-key"></i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
        <br /> -->
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
            text: 'Persentase Jumlah Siswa Perdiklat'
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
                enabled: false
            },
            showInLegend: true
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