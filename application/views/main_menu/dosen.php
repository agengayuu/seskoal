<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 py-0 border-left-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <h5 class="card-title" style="font-weight: bolder;">Informasi/Pengumuman</h5>
                        </div>
                        <div class="col-2">
                            <a href="<?php echo base_url('informasi_akademik/info') ?>" class="btn btn-info">Lihat Semua</a>
                        </div>
                    </div>
                    <?php foreach ($pengumuman as $peng) { ?>
                        <label>Tanggal <?= $peng->tgl_pembuatan; ?></label>
                        <h5 class="card-title" style="font-weight:bold; color:blue;"><?= $peng->judul_pengumuman; ?></h5>
                        <p class="card-text"><?= $peng->isi_pengumuman ?>
                        </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <h3>
        <center>Selamat Datang di Aplikasi Akademik SESKOAL</center>
    </h3>
    <br />
    <div class="row shadow p-3 mb-5 ml-1 bg-white rounded col-md-12">
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